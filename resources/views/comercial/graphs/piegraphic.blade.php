<div class="card">
    <div class="card-header">
        Performance Consultor
    </div>
    <div class="card-body">
        <div class="graphs">

            <canvas id="bar_Chart" style="max-height: 250px;"></canvas>
            {{--  <canvas id="myPieGraph" style="max-height: 200px;"></canvas> --}}
        </div>
        <div class="tabla-datos2" id="tabla-datos2">


        </div>

    </div>
</div>





<script>
    var datos = @json($datos);
    /*console.log(datos); */
    /*  let meses1 = String($("#meses").val()).padStart(2, "0");
     console.log(`mes 1: ${meses1}`);
     let annio1 = $("#anios").val();
     let meses2 = String($("#meses2").val()).padStart(2, "0");
     let annio2 = $("#anios2").val(); */

    function genGraphics(datos) {
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

            consultor.nombre.push(dato.nombre);
            consultor.push(dato.receita_liquida);
            consultor.colBack.push(colorsBack[i]);
            consultor.colBord.push(colorsBord[i])

            i += 1;


        });

        consults.push(consultor);

        console.log(consults);


        //********************************************
        /*      ┌─┐┬ ┬┌┐┌┌─┐┬┌─┐┌┐┌  ╔═╗┬─┐┌─┐┌─┐┬┌─┐┌─┐┬─┐
                ├┤ │ │││││  ││ ││││  ║ ╦├┬┘├─┤├┤ ││  ├─┤├┬┘
                └  └─┘┘└┘└─┘┴└─┘┘└┘  ╚═╝┴└─┴ ┴└  ┴└─┘┴ ┴┴└─ */



        // function graphicDatosPerf(consults) {
        $(document).ready(function() {

            var areaChartData = {
                labels: [], //['Jun', 'Jul', 'Ago'],
                datasets: []
            };
            alert(consults.length);
            var arrlabels = [];
            consults.forEach(function(consultor) {
                // alert('eNTRO ');
                arrlabels.push(consultor.nombre)

                var dataset = {

                    backgroundColor: consultor.colBack,
                    borderColor: consultor.colBord,
                    data: consultor.valors

                };
                areaChartData.datasets.push(dataset);
                // alert('eNTRO GRABO');
            });
            areaChartData.labels = arrlabels.slice();
            var barChartCanvas = document.getElementById('bar_Chart').getContext('2d');

            var myPieChart = new Chart(barChartCanvas, {
                /* IMPORTANTE: cargamos el complemento */
                plugins: [ChartDataLabels],
                type: 'pie',
                data: barChartCanvas.datasets,
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
                                size: "28",
                                weight: "bold",
                            },
                            /* Formato de la caja contenedora */
                            //padding: "4",
                            //borderWidth: 2,
                            //borderColor: "darkblue",
                            //borderRadius: 8,
                            //backgroundColor: "lightblue"
                        }
                    }
                }
            });
            // barChart.update();
        });

    }
    genGraphics(datos);
</script>
