$(document).ready(function() {
    var caso;
    $('#dvOpcion-dlg').dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        show: {
            effect: "blind",
            duration: 1000
        },
        hide: {
            effect: "explode",
            duration: 1000
        },
        buttons: {
            Aceptar: function() {
                var opcion = $(this).find("#txtOpcion").val();
                if(!opcion.length) {
                    alert("Escriba una descripción");
                    return;
                }
                switch(caso) {
                    case 1:     
                        var trOpcion = "<tr><td class='tdOpcion'><input type='hidden' value='" + opcion + "' name='opcion[]' />" + opcion + "</td><td class='tdSubOpciones'><button type='button' class='btnSubOpcion'>SubOpciones</button></td></tr>";
                        $("#tblOpciones").append(trOpcion);
                        $(this).find("#txtOpcion").val("");
                        break;

                    case 2:
                        $("#tblOpciones tbody tr.clicked td.tdOpcion").html("<input type='hidden' value='" + opcion + "' name='opcion[]' />" + opcion); 
                        $(this).find("#txtOpcion").val("");
                        break;
                };
                $(this).dialog( "close" );
            }
        }
    });

    $('#tblOpciones .btnAgregar').click(function() {
        caso = 1;
        $('#dvOpcion-dlg').dialog('open');
    });

    $('#tblOpciones .btnEditar').click(function() {
        caso = 2;
        var opcionSelected = $("#tblOpciones tbody tr.clicked td.tdOpcion").text();
        if(!opcionSelected.length) {
            alert("Ninguna opción seleccionada");
            return;
        }
        $('#dvOpcion-dlg').find("#txtOpcion").val(opcionSelected);
        $('#dvOpcion-dlg').dialog('open');
    });

    $('#tblOpciones .btnEliminar').click(function() {
        var opcionSelected = $("#tblOpciones tbody tr.clicked td.tdOpcion").text();
        if(!opcionSelected.length) {
            alert("Ninguna opción seleccionada");
            return;
        }
        $("#tblOpciones tbody tr.clicked").remove();
    });

    $("#tblOpciones tbody").on("click", "tr", function(){
        $(this).parent().find("tr").removeClass("clicked");
        $(this).addClass("clicked");
    });


    // Sub-opción

    $('#dvSubOpcion-dlg').dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        show: {
            effect: "blind",
            duration: 1000
        },
        hide: {
            effect: "explode",
            duration: 1000
        },
        buttons: {
            Aceptar: function() {
                var nOpcion = $("#tblOpciones tbody tr").index($("#tblOpciones tbody tr.clicked"));
                $("#tblOpciones tbody tr.clicked td.tdSubOpciones").html("<button type='button' class='btnSubOpcion'>SubOpciones</button>");
                $("#tblSubOpciones tbody tr").each(function() {
                    var subOpcion = $(this).find("td.tdSubOpcion").text();
                    $("#tblOpciones tbody tr.clicked td.tdSubOpciones").append("<input type='hidden' value='" + subOpcion + "' name='subOpcion[" + nOpcion + "][]' />");
                });
                $("#tblSubOpciones tbody tr").remove();
                $(this).dialog( "close" );
            }
        }
    });

    $("#tblOpciones").on("click", "button.btnSubOpcion", function() {
        $("#tblOpciones tbody tr.clicked td.tdSubOpciones input").each(function() {
            var subOpcion = $(this).val();
            var trSubOpcion = "<tr><td class='tdSubOpcion'>" + subOpcion + "</td></tr>";
            $("#tblSubOpciones").append(trSubOpcion);
        });
        $('#dvSubOpcion-dlg').dialog('open');
    });

    $('#tblSubOpciones .btnAgregar').click(function() {
        var subOpcion = $("#dvSubOpcion-dlg #txtSubOpcion").val();
        if(!subOpcion.length) {
            alert("Escriba una descripción");
            return;
        }
        var trSubOpcion = "<tr><td class='tdSubOpcion'>" + subOpcion + "</td></tr>";
        $("#tblSubOpciones tbody").append(trSubOpcion);
        $("#dvSubOpcion-dlg #txtSubOpcion").val("");
        $("#tblSubOpciones tbody tr").removeClass("clicked");
    });          

    $('#tblSubOpciones .btnEditar').click(function() {
        var subOpcion = $("#dvSubOpcion-dlg #txtSubOpcion").val();
        if(!subOpcion.length) {
            alert("Elige una sub-opción");
            return;
        }
        $("#tblSubOpciones tbody tr.clicked td.tdSubOpcion").text(subOpcion); 
        $("#dvSubOpcion-dlg #txtSubOpcion").val("");
        $("#tblSubOpciones tbody tr").removeClass("clicked");
    });

    $('#tblSubOpciones .btnEliminar').click(function() {
        var subOpcion = $("#dvSubOpcion-dlg #txtSubOpcion").val();
        if(!subOpcion.length) {
            alert("Elige una sub-opción");
            return;
        }       
        $("#dvSubOpcion-dlg #txtSubOpcion").val("");
        $("#tblSubOpciones tbody tr.clicked").remove();
    });

    $("#tblSubOpciones tbody").on("click", "tr", function(){
        $(this).parent().find("tr").removeClass("clicked");
        $(this).addClass("clicked");
        var subOpcion = $(this).find("td.tdSubOpcion").text();
        $("#dvSubOpcion-dlg #txtSubOpcion").val(subOpcion);
    });
});