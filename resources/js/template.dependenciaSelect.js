$(document).ready(function() {
    $('#btnDependenciaSuperior').button();
    $('#btnSeleccionar').button();
    $( '#dependenciaSelect' ).dialog({
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
        }
    });
    $('#btnDependenciaSuperior').click(function() {
        $('#dependenciaSelect').dialog('open');
    });

    $("#ulDependencia").treeview({
        animated: "fast",
        collapsed: false,
        unique: false,
        persist: "cookie"
    });

    $('#ulDependencia li ').hover(function() {
        $("#ulDependencia li a").removeClass('hover');
        $(this).addClass('hover');
    }); 

    $("#ulDependencia li a").click(function() {
        $("#ulDependencia li a").removeClass('selected');
        $(this).addClass('selected');
    });

    $('#btnSeleccionar').click(function() {
        var $dependenciaSeleccionada = $("#ulDependencia li a.selected");
        var $redSeleccionada = $dependenciaSeleccionada.parents().filter($('li')).find($("a[title='Red']"));
        $('#txtDependenciaSeleccionada').html($dependenciaSeleccionada.text() + " (" + $redSeleccionada.text() + ")");
        var tipo = $dependenciaSeleccionada.attr('title');
        $('#hdnRed').attr('value', $redSeleccionada.find('input').val());
        if(tipo === 'Dependencia')
            $('#hdnDependencia').attr('value', $dependenciaSeleccionada.find('input').val());
        else
            $('#hdnDependencia').attr('value', 0);
        $('#dependenciaSelect').dialog('close');
    });
});
