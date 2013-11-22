(function ($) {
    $.fn.list2cols = function (options) {
        var defaults = {
            campo: 'Campo',
            valor: 'Valor'
        };
        options = $.extend(defaults, options);

        return this.each(function () {
            $this = $(this);
            $this.append('<tr></tr>').find('tr').append('<td></td><td></td>');
            $this.find("td:eq(0)").append("<table class='tbl" + options.campo + "'><thead><tr><th>" + options.campo + "</th></tr></thead></table>");
            $this.find("td:eq(1)").append("<table class='tbl" + options.valor + "'><tr><th>" + options.valor + "</th></tr></table>");
            $this.find("table.tbl" + options.campo).append("<tfoot><tr><td><a href='#'>Crear</a> | <a href='#'>Editar</a> | <a href='#'>Eliminar</a></td></tr></tfoot>");
            $this.find("table.tbl" + options.valor).append("<tfoot><tr><td><a href='#'>Crear</a> | <a href='#'>Editar</a> | <a href='#'>Eliminar</a></td></tr></tfoot>");
            $this.find("table.tbl" + options.campo).after("<div class='dvMensaje' title='Mensaje'><p></p></div>");
            $this.find("table.tbl" + options.valor).after("<div class='dvMensaje' title='Mensaje'><p></p></div>");
            $this.find(".dvMensaje").dialog({
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
            $this.find('a').click(function() { 
                $('.dvMensaje:eq(0)').dialog('open');}
            )
        });
    };
})(jQuery);