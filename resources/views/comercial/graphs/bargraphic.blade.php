<div class="card">
    <div class="card-header" id="card-header">
        Performance Consultor
    </div>
    <div class="card-body">
        <div class="graphs">

            <canvas id="bar_Chart" style="max-height: 500px;"></canvas>

        </div>
        <div class="tabla-datos2" id="tabla-datos2">


        </div>

    </div>
</div>





<script>
    var datos = @json($datos);
    var rango = @json($rango);
    /*console.log(datos); */


    function genGraphicsBar(datos, rango) {
        var val_rango = [];



        rango.forEach(function(rang) {
            val_rango.push({
                mes: rang.mes,
                ann: rang.annio
            });
        });
        console.log('Rango ini-fin : ');
        console.log(val_rango);
        let meses1 = String($("#meses").val()).padStart(2, "0");
        let annio1 = $("#anios").val();
        let meses2 = String($("#meses2").val()).padStart(2, "0");
        let annio2 = $("#anios2").val();
        let info =
            `Performance Consultores <strong>Desde :</strong> ${meses1} - ${annio1} <strong> Hasta :</strong> ${meses2} - ${annio2}`;
        document.getElementById('card-header').innerHTML = info;

        //dos();
        var meses_rg = obtenerRangoMeses(parseInt(val_rango[0].mes), parseInt(val_rango[0].ann),
            parseInt(val_rango[1].mes), parseInt(val_rango[1].ann));
        console.log('Arr-Meses : ');
        console.log(meses_rg);
        let val_grup = crearArregloConCeros(meses_rg.length);
        alert(val_grup);



        let colorsBack = [
            '#007CBE',
            '#009ECE',
            '#00BDC5',
            '#00D8A8',
            '#98EC85'
        ];
        let colorsBord = [
            '#3C4856',
            '#A0ACBD',
            '#B5577E',
            '#EF8CB3',
            '#007CBE'
        ];
        var consults = [];
        var consultor = {
            nombre: "",
            valors: [],
            orden: 0,
            salBrut: 0.0,
            mesDat: [],
            annDat: [],
            colBack: "",
            colBord: ""
        };
        var promedio = {
            nombre: "",
            valors: [],
            orden: 0,
            salBrut: 0.0,
            mesDat: [],
            annDat: [],
            colBack: "",
            colBord: ""
        };
        var nomcons = '';
        var ordcons = 0;
        var valdatos = val_grup.slice();
        alert(valdatos);
        var cod_actual = '';
        var sal_bru = 0.0;
        var mes_val = [];
        var ani_val = [];
        var promedi = [];
        var pro_mes = [];
        var pro_ann = [];
        var meses = [];
        var i = 1;
        var mesann = 0;
        var maximos = 0;
        var ultimo = 0.0;
        datos.forEach(function(dato) {
            if (i == 1) {
                nomcons = dato.cod_user;
                ordcons = i;
                sal_bru = dato.sal_bruto;
                cod_actual = dato.cod_user;
                i += 1;
            }

            if (dato.cod_user == cod_actual) {
                mes_val.push(dato.mes);
                ani_val.push(dato.annio);
                //valdatos.push(dato.receita_liquida.replace(/[^0-9.]/g, ''));
                //alert(mesann);
                if (meses_rg[mesann].numeroMes == dato.mes && meses_rg[mesann].annio == dato.annio) {
                    valdatos[mesann] = parseFloat(dato.receita_liquida.replace(/[^0-9.]/g, ''));
                    maximos = maximos < valdatos[mesann] ? valdatos[mesann] : maximos;
                } else {
                    ultimo = parseFloat(dato.receita_liquida.replace(/[^0-9.]/g, ''));
                }
                promedi.push(dato.promedio_sal.replace(/[^0-9.]/g, ''));
                pro_mes.push(dato.mes);
                pro_ann.push(dato.annio);
                mesann++;
            } else {
                consultor.nombre = nomcons;
                consultor.valors = valdatos.slice();
                consultor.orden = ordcons;
                consultor.salBrut = sal_bru;
                consultor.mesDat = mes_val.slice();
                consultor.annDat = ani_val.slice();
                consultor.colBack = colorsBack[ordcons - 1];
                consultor.colBord = colorsBord[ordcons - 1];
                consults.push(consultor);

                i++;
                mesann = 0;
                valdatos = val_grup.slice();
                mes_val = [];
                ani_val = [];
                nomcons = dato.cod_user;
                console.log(
                    ` Mes : ${meses_rg[mesann].numeroMes} , ${dato.mes} - Años : ${meses_rg[mesann].annio}, ${dato.annio}`
                );
                if (meses_rg[mesann].numeroMes == dato.mes && meses_rg[mesann].annio == dato.annio) {
                    // valdatos.push(dato.receita_liquida.replace(/[^0-9.]/g, ''));
                    valdatos[mesann] = parseFloat(dato.receita_liquida.replace(/[^0-9.]/g, ''));
                    maximos = maximos < valdatos[mesann] ? valdatos[mesann] : maximos;
                }
                promedi.push(dato.promedio_sal.replace(/[^0-9.]/g, ''));
                ordcons = i;
                mesann++
                sal_bru = dato.sal_bruto;
                mes_val.push(dato.mes);
                ani_val.push(dato.annio);
                pro_mes.push(dato.mes);
                pro_ann.push(dato.annio);
                cod_actual = dato.cod_user;

                consultor = {
                    nombre: "",
                    valors: [],
                    orden: 0,
                    salBrut: 0.0,
                    mesDat: [],
                    annDat: [],
                    colBack: "",
                    colBord: ""

                };
            }
        });
        // valdatos.push(ultimo);
        valdatos[mesann] = ultimo;
        //console.log(parseFloat(dato.receita_liquida.replace(/[^0-9.]/g, ''));)
        consultor.nombre = nomcons;
        consultor.valors = valdatos.slice(); // Creamos una copia del array valdatos
        consultor.orden = ordcons;
        consultor.salBrut = sal_bru;
        consultor.mesDat = mes_val.slice();
        consultor.annDat = ani_val.slice();
        consultor.colBack = colorsBack[ordcons - 1];
        consultor.colBord = colorsBord[ordcons - 1];
        consults.push(consultor);
        promedio.mesDat = pro_mes.slice();
        promedio.annDat = pro_ann.slice();
        promedio.valors = promedi.slice();
        promedio.colBack = 'rgba(63,134,203,1)';
        promedio.colBord = 'rgba(63,134,203,1)';
        console.log('Promedios : ');
        console.log(promedio);
        console.log('Consultores : ');
        console.log(consults);
        var etiquetas = [];
        meses_rg.forEach(function(rang) {
            //alert(rang.nombreAbrev)
            etiquetas.push(rang.nombreAbrev)

        });

        //********************************************
        /*      ┌─┐┬ ┬┌┐┌┌─┐┬┌─┐┌┐┌  ╔═╗┬─┐┌─┐┌─┐┬┌─┐┌─┐┬─┐
                ├┤ │ │││││  ││ ││││  ║ ╦├┬┘├─┤├┤ ││  ├─┤├┬┘
                └  └─┘┘└┘└─┘┴└─┘┘└┘  ╚═╝┴└─┴ ┴└  ┴└─┘┴ ┴┴└─ */



        // function graphicDatosPerf(consults) {
        $(document).ready(function() {
            var areaChartData = {
                labels: etiquetas,
                datasets: []
            };

            consults.forEach(function(consultor) {

                var dataset = {
                    label: consultor.nombre,
                    backgroundColor: consultor.colBack,
                    borderColor: consultor.colBord,
                    data: consultor.valors,
                    order: consultor.orden
                };
                areaChartData.datasets.push(dataset);

            });
            var barChartCanvas = document.getElementById('bar_Chart').getContext('2d');

            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: areaChartData,
                options: {
                    //responsive: true, // Hacer que el gráfico sea responsive
                    // maintainAspectRatio: false, // Permitir ajustar las proporciones del gráfico
                    // aspectRatio: 2,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: maximos + 500,
                            ticks: {
                                callback: function(value, index, values) {
                                    return 'R$' +
                                        value; // Agrega el símbolo monetario al valor del eje y
                                }
                            }
                        }
                    }
                }
            });
            //barChart.update();

            barChart.data.datasets.push({
                label: 'Promedios',
                backgroundColor: '#00D8A8',
                borderColor: '#66E653',
                data: promedio.valors,
                type: 'line',
            });
            /* Actualizamos la gráfica */
            barChart.update();

        });





        function crearArregloConCeros(cantidad) {
            // Crear un nuevo arreglo con la longitud especificada
            return Array.from({
                length: cantidad
            }, () => 0.0);
        }

        function obtenerRangoMeses(mesInicio, annInicio, mesFin, annFin) {
            var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
            ];
            var rangoMeses = [];

            // Generar el rango de meses
            var mesActual = mesInicio;
            var annActual = annInicio;
            while (!(mesActual === mesFin && annActual === annFin)) {
                rangoMeses.push({
                    nombreCompleto: `${meses[mesActual - 1]}`,
                    nombreAbrev: `${meses[mesActual - 1].substring(0,3)}-${annActual}`,
                    numeroMes: mesActual,
                    numeroMes: mesActual,
                    annio: annActual
                });

                // Avanzar al siguiente mes
                mesActual++;
                if (mesActual > 12) {
                    mesActual = 1; // Si el mes actual supera diciembre, retrocede a enero del siguiente año
                    annActual++;
                }
            }
            // Agregar el mes final del rango
            rangoMeses.push({
                nombreCompleto: `${meses[mesFin - 1]}`,
                nombreAbrev: `${meses[mesFin - 1].substring(0,3)}-${annFin}`,
                numeroMes: mesFin,
                annio: annFin
            });

            return rangoMeses;
        }






    }


    genGraphicsBar(datos, rango);
</script>
