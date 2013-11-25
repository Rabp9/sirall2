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
            
            // Creando tablas
            $this.find("td:eq(0)").append("<table class='tbl" + options.campo + "'><thead><tr><th>" + options.campo + "</th></tr></thead><tbody></tbody></table><input type='hidden' class='hdn" + options.campo +"' />6u");
            $this.find("td:eq(1)").append("<table class='tbl" + options.valor + "'><thead><tr><th>" + options.valor + "</th></tr></thead><tbody></tbody></table>");
            
            // Creando punteros para las tablas
            $this.find("table.tbl" + options.campo + " tbody").css("cursor", "pointer");
            $this.find("table.tbl" + options.valor + " tbody").css("cursor", "pointer");
            
            // Creando eventos de click en filas
            $this.find("table.tbl" + options.campo + " tbody").on("click", "tr", function(){
                $(this).parent().children().addClass("list2colsNormal");
                $(this).addClass("list2colsSelect");
            });
            
            // Agregando botones
            $this.find("table.tbl" + options.campo).append("<tfoot><tr><td><a href='#'>Crear</a> | <a href='#'>Editar</a> | <a href='#'>Eliminar</a></td></tr></tfoot>");
            $this.find("table.tbl" + options.valor).append("<tfoot><tr><td><a href='#'>Crear</a> | <a href='#'>Editar</a> | <a href='#'>Eliminar</a></td></tr></tfoot>");
            
            // Agregando dialogs
            $this.find("table.tbl" + options.campo).after("<div class='dvMensaje" + options.campo +"' title='Mensaje'><p>Ingresa una descripción:</p><p><input type='text' class='txt" + options.campo +"'/></p></div>");
            $this.find("table.tbl" + options.valor).after("<div class='dvMensaje" + options.valor +"' title='Mensaje'><p>aaaaaa</p></div>");
            
            $this.find(".dvMensaje" + options.campo).dialog({
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
                    "Aceptar": function() {
                        var accion = $(".dvMensaje" + options.campo + " input.hdn" + options.campo).val();
                        alert(accion);
                        var campo = $(this).find("input.txt" + options.campo).val();
                        $this.find("table.tbl" + options.campo + " tbody").append("<tr><td>" + campo +"</td></tr>");     
                        $(this).dialog("close");        
                    },
                    "Cancelar": function() {
                        $(this).dialog("close");
                    }
                }
            });
            $this.find(".dvMensaje" + options.valor).dialog({
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
                    "Aceptar": function() {
                        $('form').submit();
                    },
                    "Cancelar": function() {
                        $(this).dialog("close");
                    }
                }
            });
            
            // Botón crear
            $this.find("table.tbl" + options.campo + " a:contains('Crear')").click(function() {
                $(".dvMensaje" + options.campo + " input.hdn" + options.campo).val('crear');
                $(".dvMensaje" + options.campo + " input.txt" + options.campo).val("");
                $(".dvMensaje" + options.campo).dialog('open');
                $(".dvMensaje" + options.campo + " input.txt" + options.campo).focus();
            });
            
            // Botón editar
            $this.find("table.tbl" + options.campo + " a:contains('Editar')").click(function() {
                $(".dvMensaje" + options.campo + " input.hdn" + options.campo).val('editar');
                var campo = $this.find("table.tbl" + options.campo).find('tr.list2colsSelect td').text();
                $(".dvMensaje" + options.campo + " input.txt" + options.campo).val(campo);
                $(".dvMensaje" + options.campo).dialog('open');
                $(".dvMensaje" + options.campo + " input.txt" + options.campo).focus();
            });
            
            $this.find("table.tbl" + options.campo + " a:contains('Crear')").click(function() {
                $(".dvMensaje" + options.campo + " input").val("");
                $(".dvMensaje" + options.campo).dialog('open');
                $(".dvMensaje" + options.campo + " input").focus();
            });
            $this.find("table.tbl" + options.valor + " a").click(function() {
                $(".dvMensaje" + options.valor).dialog('open');}
            )
        });
    };
})(jQuery);