(function($) {
    $.fn.dato = function() {
        $.ajax({
            url: 'Index.php',
            type: 'GET',
            data: {
                controller: 'Modelo',
                action: 'modeloAJAX',
                idMarca: $('#txtIdMarca').val(),
                idTipoEquipo: $('#txtIdTipoEquipo').val()
            },
            success: function(data) {
                $('#cboModelo').html("<option disabled selected value=''>Selecciona un Modelo</option>");
                $(data).find('Modelo').each(function() {
                    var option = new Option($(this).find('descripcion').text(), $(this).find('idModelo').text());
                    $('#cboModelo').append(option);
                });
            }
        });
        this.find("td.clave").append("");
    };
})(jQuery);