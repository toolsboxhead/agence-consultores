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
        let select = document.getElementById("test");
        let consSelected = [];
        for (let i = 0; i < select.options.length; i++) {
            if (select.options[i].selected) {
                consSelected.push("'" + select.options[i].value + "'");
                //  consSelected.push(select.options[i].value);
            }
        }
        let conjuntoString = consSelected.join(", ");

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
                    //consSelected.push("'" + select.options[i].value + "'");
                    consSelected.push(select.options[i].value);
                }
            }
            var conjuntoString = consSelected.join(",");

            conjuntoString;
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

const styles = document.documentElement.style;
const clases = document.documentElement.classList;

// Iterar sobre la lista de clases
for (let i = 0; i < clases.length; i++) {
    const className = clases[i];

    // Verificar si la clase comienza con el texto especificado
    if (className.startsWith("bs")) {
        // Extraer el valor de la clase
        const valorClase = className.split("-")[1]; // Suponiendo que el formato sea "textoEspecifico-valor"
    }
}
