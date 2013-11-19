(function($) {
    $.fn.dato = function() {
        $.ajax({
            url: "resources/xml/opcionDato.xml",
            dataType: "xml",
            success:
                function(data) {
                    var $td = $(this).find('tbody tr:eq(0) td.clave select');
                    $tdg
                }
        });
    };
})(jQuery);