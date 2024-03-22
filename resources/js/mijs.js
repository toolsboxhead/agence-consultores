/* alert("Hola world"); */
jQuery(function ($) {
    let duallist = $("#test").bootstrapDualListbox({
        nonSelectedListLabel: "Sin Seleccionar",
        selectedListLabel: "Seleccionados",
        preserveSelectionOnMove: "moved",
        moveOnSelect: true,
        nonSelectedFilter: "",
        filterTextClear: "",
        filterPlaceHolder: "Filtro",
        infoTextEmpty: "",
        infoText: false,
    });
    $("#g-bar").click(function (e) {
        var select = document.getElementById("test");
        var consSelected = [];
        for (let i = 0; i < select.options.length; i++) {
            if (select.options[i].selected) {
                consSelected.push("'" + select.options[i].value + "'");
            }
        }
        var conjuntoString = consSelected.join(", ");

        let meses1 = String($("#meses").val()).padStart(2, "0");
        let annio1 = $("#anios").val();
        let meses2 = String($("#meses2").val()).padStart(2, "0");
        let annio2 = $("#anios2").val();

        $.ajax({
            url: "grafica-bar",
            method: "POST",
            data: {
                set_consults: conjuntoString,
                mesdesde: meses1,
                aniodesde: annio1,
                meshasta: meses2,
                aniohasta: annio2,
                _token: $('input[name="_token"]').val(),
            },
        }).done(function (res) {
            $("#tabla-datos").html(res.html);
        });
    });

    $("#g-area").click(function (e) {
        var select = document.getElementById("test");
        var consSelected = [];
        for (let i = 0; i < select.options.length; i++) {
            if (select.options[i].selected) {
                consSelected.push("'" + select.options[i].value + "'");
            }
        }
        var conjuntoString = consSelected.join(", ");

        let meses1 = String($("#meses").val()).padStart(2, "0");
        let annio1 = $("#anios").val();
        let meses2 = String($("#meses2").val()).padStart(2, "0");
        let annio2 = $("#anios2").val();

        $.ajax({
            url: "grafica-pie",
            method: "POST",
            data: {
                set_consults: conjuntoString,
                mesdesde: meses1,
                aniodesde: annio1,
                meshasta: meses2,
                aniohasta: annio2,
                _token: $('input[name="_token"]').val(),
            },
        }).done(function (res) {
            $("#tabla-datos").html(res.html);
        });
    });

    $(document).ready(function () {
        /*  var conjuntoString = "Ab"; */
        $("#tabla").click(function (e) {
            var select = document.getElementById("test");
            var consSelected = [];
            for (let i = 0; i < select.options.length; i++) {
                if (select.options[i].selected) {
                    consSelected.push("'" + select.options[i].value + "'");
                }
            }
            var conjuntoString = consSelected.join(", ");

            let meses1 = String($("#meses").val()).padStart(2, "0");
            let annio1 = $("#anios").val();
            let meses2 = String($("#meses2").val()).padStart(2, "0");
            let annio2 = $("#anios2").val();

            $.ajax({
                url: "actualizar-tabla",
                method: "POST",
                data: {
                    set_consults: conjuntoString,
                    mesdesde: meses1,
                    aniodesde: annio1,
                    meshasta: meses2,
                    aniohasta: annio2,
                    _token: $('input[name="_token"]').val(),
                },
            }).done(function (res) {
                $("#tabla-datos").html(res.html);
            });
        });
    });
});
maximos = maximos < valdatos[mesann] ? valdatos[mesann] : maximos;
/* if (meses_rg[mesann].numeroMes == dato.mes && mes_rg_[mesann].annio = dato.annio) {
    valdatos[mesann] = dato.receita_liquida.replace(/[^0-9.]/g, '');
    mesann += 1;
} */
