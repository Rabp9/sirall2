$(document).ready(function() {
    $('#btnAreaSuperior').button();
    $('#btnSeleccionar').button();
    $('#areaSelect').dialog({
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
    $('#btnAreaSuperior').click(function() {
        $('#areaSelect').dialog('open');
    });

    $("#ulArea").treeview({
        animated: "fast",
        collapsed: true,
        unique: false,
        persist: "cookie"
    });
    $('#ulArea li button').css({'border-style': 'none', 'background-color': '#fff' });
    $('#ulArea li button').hover(function() {
        $("#ulArea li button").removeClass('hover');
        $(this).addClass('hover');
    }); 

    $("#ulArea li button").click(function() {
        $("#ulArea li button").removeClass('selected');
        $(this).addClass('selected');
    });

    $('#btnSeleccionar').click(function() {
        var $areaSeleccionada = $("#ulArea li button.selected");
        if($($areaSeleccionada).length) {
            var $establecimientoSeleccionada = $areaSeleccionada.parents().filter($('li')).find($("button[title='Establecimiento']"));
            $('#txtAreaSeleccionada').html($areaSeleccionada.text() + " (" + $establecimientoSeleccionada.text() + ")");
            var tipo = $areaSeleccionada.attr('title');
            $('#hdnEstablecimiento').attr('value', $establecimientoSeleccionada.find('input').val());
            if(tipo === 'Area')
                $('#hdnArea').attr('value', $areaSeleccionada.find('input').val());
            else
                $('#hdnArea').attr('value', null);
            $('#areaSelect').dialog('close');
        }
        else
            alert('Selecciona un área');
    });
});