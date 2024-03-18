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
            //alert(res);
            //$("#tabla-datos").html("<p>Hola</p>");
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

    $("#toto").click(function () {
        $("#test").append('<option value="toto">toto</option>');
        duallist.bootstrapDualListbox("refresh", true);
    });

    $("#tototo").click(function () {
        $("#test").append(
            '<option value="toto">toto</option><option value="toto">toto2</option>'
        );
        duallist.bootstrapDualListbox("refresh", true);
        console.log($('[name="duallistbox_permissions[]"]').val().join(";"));
    });
    $("#test").change(function () {
        console.log($("#test").val());
        console.log($("#test").val().join(";"));
        console.log($("#test").val().length);
    });

    const maybeNull = undefined;
    if (maybeNull) {
        console.log("Not null");
    } else {
        console.log("Could be null");
    } // Could be null

    for (let i = 0; null; i++) {
        console.log("Won't run");
    }

    maybeNull ? console.log("truthy value") : console.log("Falsy value");

    /* $("#submit").click(function (event) {
        var select = document.getElementById("miSelect");
        var opcionesSeleccionadas = [];
        for (var i = 0; i < select.options.length; i++) {
            if (select.options[i].selected) {
                opcionesSeleccionadas.push("'" + select.options[i].value + "'");
            }
        }
        var valoresString = opcionesSeleccionadas.join(", ");
        console.log(valoresString);
    }); */

    $("#array").click(function (event) {
        alert("click");
        /* var select = document.getElementById("test");
        var consSelected = [];
        for (var i = 0; i < select.options.length; i++) {
            if (select.options[i].selected) {
                consSelected.push("'" + select.options[i].value + "'");
            }
        }
        var conjuntoString = consSelected.join(", ");
        console.log(conjuntoString); */
        /* let meses1 = String($("#meses").val()).padStart(2, "0");
        let annio1 = $("#anios").val();
        let meses2 = String($("#meses2").val()).padStart(2, "0");
        let annio2 = $("#anios2").val(); */

        /* console.log(`clickeado ${meses1} ${annio1} `);
        console.log(`clickeado ${meses2} ${annio2} `); */
    });
});
