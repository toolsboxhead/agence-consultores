<div class="card">
    <div class="card-header">
        Performance Consultor
    </div>
    <div class="card-body">
        <div class="graphs">

            <canvas id="myPieGraph" style="max-height: 200px;"></canvas>

        </div>
        <div class="tabla-datos2" id="tabla-datos2">


        </div>

    </div>
</div>


<script>
    var datos = @json($datos);

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
            mesDat: [],
            annDat: [],
            colBac: [],

        };

        var i = 1;

        datos.forEach(function(dato) {

            consultor.nombre.push(dato.cod_user);
            consultor.valors.push(dato.porcentaje);
            consultor.mesDat.push(dato.mes);
            consultor.annDat.push(dato.annio);
            consultor.colBac.push(colorsBack[i - 1]);
            consults.push(consultor);
            i += 1;
        });



        console.log(consults);
        //********************************************
        /*      ┌─┐┬ ┬┌┐┌┌─┐┬┌─┐┌┐┌  ╔═╗┬─┐┌─┐┌─┐┬┌─┐┌─┐┬─┐
                ├┤ │ │││││  ││ ││││  ║ ╦├┬┘├─┤├┤ ││  ├─┤├┬┘
                └  └─┘┘└┘└─┘┴└─┘┘└┘  ╚═╝┴└─┴ ┴└  ┴└─┘┴ ┴┴└─ */



        // function graphicDatosPerf(consults) {
        $(document).ready(function() {

            const areaChartData = {
                labels: consultor.nombre,
                datasets: [{
                    data: consultor.valors,
                    backgroundColor: consultor.colBack,
                    hoverOffset: 4,
                }],
            };





            var barChartCanvas = document.getElementById('myPieGraph').getContext('2d');


            //  var pieCtx = myPieGraph.getContext('2d');

            var myPieChart = new Chart(barChartCanvas, {
                /* IMPORTANTE: cargamos el complemento */
                plugins: [ChartDataLabels],
                type: 'pie',
                data: areaChartData,
                options: {
                    plugins: {
                        datalabels: {
                            /* anchor puede ser "start", "center" o "end" */
                            anchor: "end",
                            /* Podemos modificar el texto a mostrar */
                            formatter: (dato) => dato + "%",
                            /* Color del texto */
                            color: "black",
                            /* Formato de la fuente */
                            font: {
                                family: '"Times New Roman", Times, serif',
                                size: "15",
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
                    // circumferencePercentage: 80
                }
            });
        });
    }
    genGraphics(datos);
</script>
