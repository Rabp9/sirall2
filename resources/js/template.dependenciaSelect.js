$(document).ready(function() {
    $('#btnDependenciaSuperior').button();
    $('#btnSeleccionar').button();
    $('#dependenciaSelect').dialog({
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
        collapsed: true,
        unique: false,
        persist: "cookie"
    });
    $('#ulDependencia li button').css({'border-style': 'none', 'background-color': '#fff' });
    $('#ulDependencia li button').hover(function() {
        $("#ulDependencia li button").removeClass('hover');
        $(this).addClass('hover');
    }); 

    $("#ulDependencia li button").click(function() {
        $("#ulDependencia li button").removeClass('selected');
        $(this).addClass('selected');
    });

    $('#btnSeleccionar').click(function() {
        var $dependenciaSeleccionada = $("#ulDependencia li button.selected");
        if($($dependenciaSeleccionada).length) {
            var $establecimientoSeleccionada = $dependenciaSeleccionada.parents().filter($('li')).find($("button[title='Establecimiento']"));
            $('#txtDependenciaSeleccionada').html($dependenciaSeleccionada.text() + " (" + $establecimientoSeleccionada.text() + ")");
            var tipo = $dependenciaSeleccionada.attr('title');
            $('#hdnEstablecimiento').attr('value', $establecimientoSeleccionada.find('input').val());
            if(tipo === 'Dependencia')
                $('#hdnDependencia').attr('value', $dependenciaSeleccionada.find('input').val());
            else
                $('#hdnDependencia').attr('value', null);
            $('#dependenciaSelect').dialog('close');
        }
        else
            alert('Selecciona una dependencia');
    });
});