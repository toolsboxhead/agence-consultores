<div class="card">
    <div class="card-header">
        Performance Consultor
    </div>
    <div class="card-body">
        <div class="graphs">

            <canvas id="bar_Chart" style="max-height: 180px;"></canvas>

        </div>
        <div class="tabla-datos2" id="tabla-datos2">


        </div>

    </div>
</div>





<script>
    var datos = @json($datos);
    /*console.log(datos); */
    /* let meses1 = String($("#meses").val()).padStart(2, "0");
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
            nombre: "",
            valors: [],
            orden: 0,
            salBrut: 0.0,
            mesDat: [],
            annDat: 0,
            colBack: "",
            colBord: ""
        };
        var nomcons = '';
        var ordcons = 0;
        var valdatos = [];
        var cod_actual = '';
        var sal_bru = 0.0;
        var mes_val = [];
        var ani_val = 0;
        var i = 1;

        datos.forEach(function(dato) {
            if (i == 1) {
                nomcons = dato.cod_user;
                ordcons = i;
                sal_bru = dato.sal_bruto;

                ani_val = dato.annio;
                cod_actual = dato.cod_user;
                i += 1;
            }

            if (dato.cod_user == cod_actual) {
                mes_val.push(dato.mes);
                valdatos.push(dato.receita_liquida.replace(/[^0-9.]/g, ''));
            } else {
                consultor.nombre = nomcons;
                consultor.valors = valdatos.slice(); // Creamos una copia del array valdatos
                consultor.orden = ordcons;
                consultor.salBrut = sal_bru;
                consultor.mesDat = mes_val.slice();
                consultor.aniDat = ani_val;
                consultor.colBack = colorsBack[ordcons - 1];
                consultor.colBord = colorsBord[ordcons - 1];
                consults.push(consultor);

                i += 1;
                valdatos = [];
                mes_val = [];
                nomcons = dato.cod_user;
                valdatos.push(dato.receita_liquida.replace(/[^0-9.]/g, ''));
                ordcons = i;
                sal_bru = dato.sal_bruto;
                mes_val.push(dato.mes);
                ani_val = dato.annio;
                cod_actual = dato.cod_user;

                consultor = { // Reiniciamos el objeto consultor para el siguiente consultor
                    nombre: "",
                    valors: [],
                    orden: 0,
                    salBrut: 0.0,
                    mesDat: [],
                    annDat: 0,
                    colBack: "",
                    colBord: ""

                };
            }
        });

        // Agregar el último consultor después de salir del bucle
        consultor.nombre = nomcons;
        consultor.valors = valdatos.slice(); // Creamos una copia del array valdatos
        consultor.orden = ordcons;
        consultor.salBrut = sal_bru;
        consultor.mesDat = mes_val.slice();
        consultor.aniDat = ani_val;
        consultor.colBack = colorsBack[ordcons - 1];
        consultor.colBord = colorsBord[ordcons - 1];
        consults.push(consultor);

        console.log(consults);


        //********************************************
        /*      ┌─┐┬ ┬┌┐┌┌─┐┬┌─┐┌┐┌  ╔═╗┬─┐┌─┐┌─┐┬┌─┐┌─┐┬─┐
                ├┤ │ │││││  ││ ││││  ║ ╦├┬┘├─┤├┤ ││  ├─┤├┬┘
                └  └─┘┘└┘└─┘┴└─┘┘└┘  ╚═╝┴└─┴ ┴└  ┴└─┘┴ ┴┴└─ */



        // function graphicDatosPerf(consults) {
        $(document).ready(function() {
            var areaChartData = {
                labels: ['Jun', 'Jul', 'Ago'],
                datasets: []
            };
            alert(consults.length);
            consults.forEach(function(consultor) {
                // alert('eNTRO ');
                var dataset = {
                    label: consultor.nombre,
                    backgroundColor: consultor.colBack,
                    borderColor: consultor.colBord,
                    data: consultor.valors,
                    order: consultor.orden
                };
                areaChartData.datasets.push(dataset);
                alert('eNTRO GRABO');
            });
            var barChartCanvas = document.getElementById('bar_Chart').getContext('2d');

            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: areaChartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 15000
                        }
                    }
                }
            });
            barChart.update();
        });

    }
    genGraphics(datos);
</script>
