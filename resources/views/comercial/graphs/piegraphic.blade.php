<div class="card">
    <div class="card-header" id="card-header">
        Performance Consultor
    </div>
    <div class="card-body">
        <div class="graphs">

            {{-- <canvas id="bar_Chart" style="max-height: 180px;"></canvas> --}}
            <canvas id="myPieGraph" style="max-height: 400px;"></canvas>
        </div>
        <div class="tabla-datos2" id="tabla-datos2">


        </div>

    </div>
</div>

<script>
var datos = @json($datos);

function genGraphics(datos) {
    let meses1 = String($("#meses").val()).padStart(2, "0");
    let annio1 = $("#anios").val();
    let meses2 = String($("#meses2").val()).padStart(2, "0");
    let annio2 = $("#anios2").val();

    //let val_grup = crearArregloConCeros(meses_rg.length);
    let info =
        `Performance Consultores <strong>Desde :</strong> ${meses1} - ${annio1} <strong> Hasta :</strong> ${meses2} - ${annio2}`;
    document.getElementById('card-header').innerHTML = info;






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
        nombre: [],
        valors: [],
        orden: 0,
        salBrut: 0.0,
        mesDat: [],
        annDat: 0,
        colBack: [],
        colBord: []
    };
    var nomcons = '';
    var ordcons = 0;
    var valdatos = [];
    var cod_actual = '';
    var sal_bru = 0.0;
    var mes_val = [];
    var ani_val = 0;
    var i = 0;

    datos.forEach(function(dato) {

        consultor.nombre.push(dato.cod_user);
        consultor.valors.push(dato.porcentaje);
        consultor.colBack.push(colorsBack[i]);
        consultor.colBord.push(colorsBord[i]);

        i += 1;


    });
    /* consultor.colBack = "#4EADEB";
    consultor.colBord = "#3F86CB"; */
    consults.push(consultor);




    const pieData = {
        labels: consultor.nombre,
        datasets: [{
            data: consultor.valors,
            backgroundColor: consultor.colBack,
            hoverOffset: 4,
        }],
    };

    var pieCtx = myPieGraph.getContext('2d');

    var myPieChart = new Chart(pieCtx, {
        /* IMPORTANTE: cargamos el complemento */
        plugins: [ChartDataLabels],
        type: 'pie',
        data: pieData,
        options: {
            plugins: {
                datalabels: {
                    /* anchor puede ser "start", "center" o "end" */
                    anchor: "center",
                    /* Podemos modificar el texto a mostrar */
                    formatter: (dato) => dato + "%",
                    /* Color del texto */
                    color: "black",
                    /* Formato de la fuente */
                    font: {
                        family: '"Times New Roman", Times, serif',
                        size: "16",
                        weight: "bold",
                    },

                }
            }
        }
    });
}
genGraphics(datos);
</script>
