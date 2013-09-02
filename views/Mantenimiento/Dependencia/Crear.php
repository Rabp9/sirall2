<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.js"></script>
        <script type="text/javascript" src="resources/js/funciones.js"></script>
       
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
            
        <script type="text/javascript">
            $(document).ready(function() {
                isRequired($('#txtNombres'));
                isRequired($('#txtDescripcion'));
                isRequired($('#txtApellidoMaterno'));
                setValue($('#txtIdDependencia'), <?php echo $nextID; ?>);
                isReadOnly($('#txtIdDependencia'));
                $('#txtDescripcion').focus();
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                var cboId = 1;
                var changeSelect = function(event) {
                    var id = 0;
                    if($(this).attr('id') !== $('#cboRed').attr('id'))
                        id = $(this).val();
                    $.ajax({
                        url: 'Index.php',
                        type: 'GET',
                        data: {
                            controller: 'Dependencia',
                            action: 'SubDependencias',
                            superIdDependencia: id,
                            idRed: $('#cboRed').val()
                        },
                        success: function(data) {
                            //limpiar
                            var $target = $(event.target);
                            if($target.attr('id') === $('#cboRed').attr('id')) {
                                $('#cbo0').html('<option disabled selected>Selecciona una Dependencia</option>');
                                $(data).find('Dependencia').each(function() {
                                    if($(this).find('superIdDependencia').text() === '') {
                                        var option = new Option($(this).find('descripcion').text(), $(this).find('idDependencia').text());
                                        $('#cbo0').append(option);
                                    }
                                });
                            }
                            else {
                                var nivel = $target.attr('id').charAt($target.attr('id').length-1);
                                if(nivel !== 'a')
                                    cboId = parseInt(nivel) + 1;
                                $('#cbo').find('select').each(function() {
                                   // if($(this).attr('id') != $('#cboDependencia').attr('id')) {
                                        //si nivel de this es mayor a nivel
                                        var thisNivel = $(this).attr('id').charAt($(this).attr('id').length-1);
                                        if(thisNivel > nivel)
                                            $(this).remove();
                                    //}
                                });
                                $('#cbo').find('br').each(function(index) {
                                    if(index >= nivel)
                                        $(this).remove();
                                });
                                $('#cbo').find('span').each(function(index) {
                                    if(index >= nivel)
                                        $(this).remove();
                                });
                                if($(data).find('dependencia').length !== 0 ) {
                                    //limpiar


                                    var $cbo = "<select id='cbo" + cboId + "'></select>";
                                    var txt = '';
                                    for(i = 0; i < nivel; i++)
                                        txt += '&nbsp;&nbsp;';
                                    $('#cbo').append('<br/>' + txt +'<span class="ui-icon ui-icon-arrowreturnthick-1-e" style="display:inline-block;"></span>' + $cbo);
                                    $('#cbo' + cboId).append("<option disabled selected>Selecciona una Dependencia</option>");
                                    $(data).find('Dependencia').each(function() {
                                        var option = new Option($(this).find('descripcion').text(), $(this).find('idDependencia').text());
                                        $('#cbo' + cboId).append(option);
                                    });
                                    $('#cbo' + cboId).change(changeSelect);
                                    cboId += 1;
                               }
                            }
                        }
                    })
                };
                
                $('select').change(changeSelect);
                
                $('#frmCrearDependencia').submit(function() {
                    if($('#cbo select:last').val() !== null)
                        $('#cboDependencia').val($('#cbo select:last').val());
                    else
                        $('#cboDependencia').val($('#cbo select:nth-last-child(4)').val());
                });
            });
        </script>
        <title>SIRALL2 - Crear Dependencia</title>
    </head>
    <body>
        <aside>
            <header>
                <?php include_once 'views/Home/header.php';?>
            </header>
            <nav>
                <?php include_once 'views/Home/nav.php';?>
            </nav>
        </aside>
        <section>
            <article>
                <header>
                    <hgroup>
                        <h2>Crear Dependencia</h2>
                        <h4>Crea una Dependencia</h4>
                    </hgroup>
                </header>
                <form id="frmCrearDependencia" method="POST" action="?controller=Dependencia&action=CrearPOST">
                    <fieldset>
                        <legend>Crear Dependencia</legend>
                        <table>
                            <tr>
                                <td><label for="txtIdDependencia"><abbr title="Código identificador">ID.</abbr> Dependencia</label></td>
                                <td><input id="txtIdDependencia" type="text" name="idDependencia"></td>
                            </tr>
                            <tr>
                                <td><label for="txtDescripcion">Descripcion</label></td>
                                <td><input id="txtDescripcion" type="text" name="descripcion" placeholder="Escribe una descripción"></td>  
                            </tr>
                            <tr>
                                <td><label for="cboRed">Red</label></td>
                                <td>
                                    <select id="cboRed" name="idRed">
                                        <option disabled selected>Selecciona una Red</option>
                                        <?php 
                                            if($redes) { 
                                                foreach ($redes as $red) {
                                                    echo "<option value='" . $red->getIdRed() . "'>" . $red->getDescripcion() . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="cboDependenciaSuperior">Dependencia Superior</label></td>
                                <td id="cbo">
                                    <input id="cboDependencia" type="hidden" name="superIdDependencia"/>
                                    <select id="cbo0">
                                        <option disabled selected>Selecciona una Dependencia</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Dependencia">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>