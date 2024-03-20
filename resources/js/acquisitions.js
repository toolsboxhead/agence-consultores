function genGraphics(datos) {
    let colorsBack = ["#007CBE", "#009ECE", "#00BDC5", "#00D8A8", "#98EC85"];
    let colorsBord = ["#3C4856", "#A0ACBD", "#B5577E", "#EF8CB3", "#007CBE"];
    var consults = [];
    var consultor = {
        nombre: "",
        valors: [],
        orden: 0,
        salBrut: 0.0,
        mesDat: [],
        annDat: [],
        colBack: "",
        colBord: "",
    };
    var promedio = {
        nombre: "",
        valors: [],
        orden: 0,
        salBrut: 0.0,
        mesDat: [],
        annDat: [],
        colBack: "",
        colBord: "",
    };
    var nomcons = "";
    var ordcons = 0;
    var valdatos = [];
    var cod_actual = "";
    var sal_bru = 0.0;
    var mes_val = [];
    var ani_val = [];
    var promedi = [];
    var pro_mes = [];
    var pro_ann = [];
    var i = 1;

    datos.forEach(function (dato) {
        if (i == 1) {
            nomcons = dato.cod_user;
            ordcons = i;
            sal_bru = dato.sal_bruto;
            mes_val.push(dato.mes);
            ani_val.push(dato.annio);
            pro_mes.push(dato.mes);
            pro_ann.push(dato.annio);
            cod_actual = dato.cod_user;
            i += 1;
        }

        if (dato.cod_user == cod_actual) {
            mes_val.push(dato.mes);
            ani_val.push(dato.annio);
            valdatos.push(dato.receita_liquida.replace(/[^0-9.]/g, ""));
            promedi.push(dato.promedio.replace(/[^0-9.]/g, ""));
        } else {
            consultor.nombre = nomcons;
            consultor.valors = valdatos.slice(); // Creamos una copia del array valdatos
            consultor.orden = ordcons;
            consultor.salBrut = sal_bru;
            consultor.mesDat = mes_val.slice();
            consultor.annDat.push(dato.annio);
            consultor.aniDat = ani_val.slice();
            consultor.colBack = colorsBack[ordcons - 1];
            consultor.colBord = colorsBord[ordcons - 1];
            consults.push(consultor);

            i += 1;
            valdatos = [];
            mes_val = [];
            nomcons = dato.cod_user;
            valdatos.push(dato.receita_liquida.replace(/[^0-9.]/g, ""));
            promedi.push(dato.promedio.replace(/[^0-9.]/g, ""));
            ordcons = i;
            sal_bru = dato.sal_bruto;
            mes_val.push(dato.mes);
            ani_val.push(dato.annio);
            pro_mes.push(dato.mes);
            pro_ann.push(dato.annio);
            cod_actual = dato.cod_user;

            consultor = {
                // Reiniciamos el objeto consultor para el siguiente consultor
                nombre: "",
                valors: [],
                orden: 0,
                salBrut: 0.0,
                mesDat: [],
                annDat: [],
                colBack: "",
                colBord: "",
            };
        }
    });

    // Agregar el último consultor después de salir del bucle
    consultor.nombre = nomcons;
    consultor.valors = valdatos.slice(); // Creamos una copia del array valdatos
    consultor.orden = ordcons;
    consultor.salBrut = sal_bru;
    consultor.mesDat = mes_val.slice();
    consultor.annDat = ani_val.slice;
    consultor.colBack = colorsBack[ordcons - 1];
    consultor.colBord = colorsBord[ordcons - 1];
    consults.push(consultor);
    promedio.mesDat = pro_mes.slice();
    promedio.annDat = pro_ann.slice();
    promedio.valors = promedi.slice();
    promedio.colBack = "rgba(63,134,203,1)";
    promedio.colBord = "rgba(63,134,203,1)";
    console.log(promedio);
    console.log(consults);

    //********************************************
    /*      ┌─┐┬ ┬┌┐┌┌─┐┬┌─┐┌┐┌  ╔═╗┬─┐┌─┐┌─┐┬┌─┐┌─┐┬─┐
            ├┤ │ │││││  ││ ││││  ║ ╦├┬┘├─┤├┤ ││  ├─┤├┬┘
            └  └─┘┘└┘└─┘┴└─┘┘└┘  ╚═╝┴└─┴ ┴└  ┴└─┘┴ ┴┴└─ */

    // function graphicDatosPerf(consults) {
    $(document).ready(function () {
        var areaChartData = {
            labels: ["Jun", "Jul", "Ago"],
            datasets: [],
        };

        consults.forEach(function (consultor) {
            var dataset = {
                label: consultor.nombre,
                backgroundColor: consultor.colBack,
                borderColor: consultor.colBord,
                data: consultor.valors,
                order: consultor.orden,
            };
            areaChartData.datasets.push(dataset);
        });
        var barChartCanvas = document
            .getElementById("bar_Chart")
            .getContext("2d");

        var barChart = new Chart(barChartCanvas, {
            type: "bar",
            data: areaChartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 15000,
                    },
                },
            },
        });
        barChart.update();
    });
}
genGraphics(datos);
