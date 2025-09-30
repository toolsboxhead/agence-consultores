CODIGO DE GRAFICA DE BARRAS
<div class="card">
    <div class="card-header" id="card-header">
        Performance Consultor
    </div>
    <div class="card-body">
        <div class="graphs" style="width: 100%; height: 65vh;">


            <canvas id="bar_Chart" style="max-height: 500px;"></canvas>

        </div>
        <div class="tabla-datos2" id="tabla-datos2">


        </div>

    </div>
</div>

<script>
function parseNumber(value) {
    if (value == null) return 0;
    if (typeof value === 'number') return value;
    // quitar espacios, símbolos y separadores de miles
    let s = String(value).trim();
    // normalizar coma decimal a punto si necesario (opcional)
    s = s.replace(/\s/g, '');
    // eliminar todo excepto dígitos, punto y signo negativo
    s = s.replace(/[^0-9\.\-]/g, '');
    // si viene con comas como miles, ya quedaron quitadas. parseFloat.
    let n = parseFloat(s);
    return isNaN(n) ? 0 : n;
}

function buildMonthsRange(rango) {
    if (!Array.isArray(rango) || rango.length < 2) return [];
    const start = rango[0];
    const end = rango[1];
    const startMonth = Number(start.mes);
    const startYear = Number(start.annio);
    const endMonth = Number(end.mes);
    const endYear = Number(end.annio);

    const monthsNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
        "Octubre", "Noviembre", "Diciembre"
    ];
    const result = [];

    let m = startMonth;
    let y = startYear;
    while (true) {
        result.push({
            numeroMes: m,
            annio: y,
            nombreCompleto: monthsNames[m - 1] || m,
            nombreAbrev: (monthsNames[m - 1] ? monthsNames[m - 1].substring(0, 3) : String(m)) + '-' + y
        });
        if (m === endMonth && y === endYear) break;
        m++;
        if (m > 12) {
            m = 1;
            y++;
        }
    }
    return result;
}

function genGraphicsBar(datos, rango, options = {}) {
    // sanity checks
    datos = Array.isArray(datos) ? datos : [];
    rango = Array.isArray(rango) ? rango : [];

    const monthsRange = buildMonthsRange(rango);
    const labels = monthsRange.map(m => m.nombreAbrev);

    // índice rápido: "YYYY-M" -> índice en labels
    const indexMap = {};
    monthsRange.forEach((m, idx) => indexMap[`${m.annio}-${m.numeroMes}`] = idx);

    // estructuras para acumular
    const sumPerMonth = new Array(monthsRange.length).fill(0);
    const countPerMonth = new Array(monthsRange.length).fill(0);

    // paleta de colores (replicables)
    const colorsBack = ['#007CBE', '#009ECE', '#00BDC5', '#00D8A8', '#98EC85', '#F6C85F', '#F39C12', '#F66D9B',
        '#A57CFA', '#6EE7B7'
    ];
    const colorsBord = ['#3C4856', '#A0ACBD', '#B5577E', '#EF8CB3', '#007CBE', '#A86A00', '#C16000', '#B23B58',
        '#3D2C6F', '#2B6F59'
    ];

    // Agrupar por consultor
    const consultMap = new Map();
    let colorIdx = 0;
    let globalMax = 0;

    datos.forEach(row => {
        const cod = row.cod_user ?? row.cod ?? 'unknown';
        const name = row.nom_user ?? cod;
        const annio = Number(row.annio);
        const mes = Number(row.mes);
        const key = `${annio}-${mes}`;
        const costo = parseNumber(row.promedio_sal ?? row.promediosal ?? 0);
        const idx = indexMap[key];

        // convertir valores
        const receita = parseNumber(row.receita_liquida ?? row.valor ?? 0);
        const sal_bruto = parseNumber(row.sal_bruto ?? row.salBrut ?? 0);

        if (!consultMap.has(cod)) {
            consultMap.set(cod, {
                code: cod,
                name: name,
                values: new Array(monthsRange.length).fill(0),
                salBrut: sal_bruto,
                colorBack: colorsBack[colorIdx % colorsBack.length],
                colorBord: colorsBord[colorIdx % colorsBord.length]
            });
            colorIdx++;
        }

        // si el mes está dentro del rango, acumular
        if (typeof idx !== 'undefined') {
            sumPerMonth[idx] += costo;
            consultMap.get(cod).values[idx] += receita; // sumamos posible múltiples facturas

            // para promedio por mes contaremos si este consultor aporta (evitamos múltiples contados por varias facturas)
            // Usaremos un mapa por consultor/mes para no contar duplicados: (implementamos más abajo)
            globalMax = Math.max(globalMax, consultMap.get(cod).values[idx]);
        }
    });

    // Para contar un consultor una sola vez por mes (si había varias facturas)
    // construiremos un Set de "cod-idx" recorriendo datos
    const seenConsultMonth = new Set();
    datos.forEach(row => {
        const cod = row.cod_user ?? row.cod ?? 'unknown';
        const annio = Number(row.annio);
        const mes = Number(row.mes);
        const key = `${annio}-${mes}`;
        const costo = parseNumber(row.promedio_sal ?? row.promedio_sal ?? 0);
        const idx = indexMap[key];
        if (typeof idx !== 'undefined') {
            const setKey = `${cod}__${idx}`;
            if (!seenConsultMonth.has(setKey)) {
                seenConsultMonth.add(setKey);
                countPerMonth[idx] += 1;
            }
        }
    });


    const promedioValues = sumPerMonth.map((s, i) => {
        return countPerMonth[i] ? +(s / countPerMonth[i]) : 0;

    });

    // Construir datasets para Chart.js
    const datasets = [];
    for (const consult of consultMap.values()) {
        datasets.push({
            label: consult.name,
            backgroundColor: consult.colorBack,
            borderColor: consult.colorBord,
            data: consult.values.map(v => +v.toFixed(2)), // asegurar número
            order: 2
        });
    }


    datasets.push({
        label: 'Promedio por mes',
        data: promedioValues.map(v => +v.toFixed(2)),
        type: 'line',
        fill: false,
        borderColor: options.promedioLineColor || '#FF5722',
        backgroundColor: options.promedioLineColor || '#FF5722',
        tension: 0.2,
        order: 1,
        yAxisID: 'y'
    });

    // limpiar gráfico previo si existiera
    if (window.__barChartInstance) {
        try {
            window.__barChartInstance.destroy();
        } catch (e) {
            /* ignore */
        }
        window.__barChartInstance = null;
    }

    const ctx = document.getElementById('bar_Chart');
    if (!ctx) {
        console.error('Canvas #bar_Chart no encontrado');
        return null;
    }

    const config = {
        type: 'bar',
        data: {
            labels: labels,
            datasets: datasets
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    stacked: false
                },
                y: {
                    beginAtZero: true,
                    // sugerir máximo con un 10% extra sobre el máximo encontrado
                    suggestedMax: Math.ceil((globalMax || 0) * 1.1),
                    ticks: {
                        callback: function(value) {
                            // formato local con 2 decimales, prefijo R$
                            if (typeof value === 'number') {
                                return 'R$ ' + value.toLocaleString(undefined, {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                            }
                            return value;
                        }
                    }
                }
            },
            interaction: {
                mode: 'index',
                intersect: false
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const v = context.parsed.y ?? context.parsed;
                            return context.dataset.label + ': R$ ' + Number(v).toLocaleString(undefined, {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                        }
                    }
                },
                legend: {
                    position: 'top'
                }
            }
        }
    };

    // crear grafica
    window.__barChartInstance = new Chart(ctx.getContext('2d'), config);
    return window.__barChartInstance;
}

var datos = @json($datos);
var rango = @json($rango);
genGraphicsBar(datos, rango);
</script>
