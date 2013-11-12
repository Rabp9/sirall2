$(document).ready(function() {
    $('#ulMenu').menu();
    $('article').addClass('ui-widget');
    $('fieldset').addClass('ui-widget-content').addClass('ui-corner-all');
    $('fieldset legend').addClass('ui-widget-header');
    $('article header').addClass('ui-widget-header');
    $('.tblLista').addClass('ui-widget-content ui-corner-all');
    $('.tblLista thead tr').addClass('ui-widget-header');
    $("button:contains('Enviar')").button({ icons: { primary: "ui-icon-check"} });
    $("button:contains('Borrar')").button({ icons: { primary: "ui-icon-cancel"} });
    $("a:contains('Detalle') img").remove();
    $("a:contains('Editar') img").remove();
    $("a:contains('Eliminar') img").remove();
    $("a:contains('Detalle')").prepend("<span class='ui-icon ui-icon-search'></span>");
    $("a:contains('Editar')").prepend("<span class='ui-icon ui-icon-pencil'></span>");
    $("a:contains('Eliminar')").prepend("<span class='ui-icon ui-icon-trash'></span>");
});
