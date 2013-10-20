$(document).ready(function() {
    $( '#confirmar' ).dialog({
        autoOpen: false,
        modal: true,
        show: {
            effect: "blind",
            duration: 1000
        },
        hide: {
            effect: "explode",
            duration: 1000
        },
        buttons: {
            "Sí": function() {
                $('form').submit();
            },
            "No": function() {
                $(this).dialog("close");
            }
        }
    });

    $('#enviar').button().focus();

    $('#enviar').click(function() {
        $('#confirmar').dialog('open');
    });
});