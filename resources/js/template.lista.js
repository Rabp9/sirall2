$(document).ready(function() {
    var botones = function() {
        $('.select')
            .button({
                icons: {
                    secondary: "ui-icon-triangle-1-s"
                }
            })                  
            .click(function() {
                var menu = $( this ).next().show().position({
                    my: "left top",
                    at: "left bottom",
                    of: this
                });
                $('*').not($(this)).click(function() {
                    menu.hide();
                });
                return false;
            })
            .next()
                .hide()
                .menu();
    };
    botones();
    $('.tblLista')
    .bind('page',   function () { botones(); })
    .dataTable( {
        "sPaginationType": "full_numbers",
        "sScrollY": "600px",
        "bJQueryUI": true,
        "bScrollCollapse": true,        
        "oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ registros por página",
            "sZeroRecords": "No se ecnontró ningún registro",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ ",
            "sInfoEmpty": "No se muestra ningún registro",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "oPaginate": {
                "sFirst": "|<",
                "sLast": ">|",
                "sNext": ">>",
                "sPrevious": "<<",
            },
            "sSearch": "Buscar"
        }
    });
    $( "#mensaje" ).dialog({
        closeOnEscape: true,
        show: 'fade',
        hide: 'fade',
        open: function(event, ui){
            setTimeout("$('#mensaje').dialog('close')",3000);
        },
        position: { 
            at: "right top", 
            of: window
        },
        buttons: [
            {
                text: "OK",
                click: function() {
                    $( this ).dialog( "close" );
                }
            }
        ]
    });
});
