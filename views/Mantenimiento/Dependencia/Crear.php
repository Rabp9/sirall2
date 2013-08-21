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
                
                var cboId = 1;
                var changeSelect = function(event) {
                    var id = $(this).val();
                    $.ajax({
                        url: 'Index.php',
                        type: 'GET',
                        data: {
                            controller: 'Dependencia',
                            action: 'SubDependencias',
                            superIdDependencia: id
                        },
                        success: function(data) {
                            //limpiar                   
                            var $target = $(event.target);
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
                            if($(data).find('dependencia').length !== 0 ) {
                                //limpiar
                                
                                
                                var $cbo = "<select id='cbo" + cboId + "'></select>";
                                $('#cbo').append('<br/>' + $cbo);
                                $('#cbo' + cboId).append("<option disabled selected>Selecciona una Dependencia</option>");
                                $(data).find('Dependencia').each(function() {
                                    var option = new Option($(this).find('descripcion').text(), $(this).find('idDependencia').text());
                                    $('#cbo' + cboId).append(option);
                                });
                                $('#cbo' + cboId).change(changeSelect);
                                cboId += 1;
                           }
                        }
                    })
                };
                
                $('select').change(changeSelect);
            });
        </script>
        <title>Titulo</title>
    </head>
    <body>
        <aside>
            <header>
                <a id="aInicio" href="/SIRALL2/">
                    <figure>
                        <img id="imgLogo" src="">
                        <h1>CABECERA</h1>
                    </figure>
                </a>
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
                <form id="frmCrearDependencia" method="POST" action="?controller=RegistrarUsuario&action=CrearUsuario">
                    <fieldset>
                        <legend>Crear Dependencia</legend>
                        <table>
                            <tr>
                                <td><label for="txtIdDependencia"><abbr title="Código identificador">ID.</abbr> Dependencia</label></td>
                                <td><input id="txtIdDependencia" type="text" name="dependencia"></td>
                            </tr>
                            <tr>
                                <td><label for="txtDescripcion">Descripcion</label></td>
                                <td><input id="txtDescripcion" type="text" name="descripcion" placeholder="Escribe una descripción"></td>  
                            </tr>
                            <tr>
                                <td><label for="cboDependenciaSuperior">Dependencia Superior</label></td>
                                <td id="cbo">
                                    <select id="cbo0" name="superIdDependencia">
                                        <option disabled selected>Selecciona una Dependencia</option>
                                        <?php 
                                            if(isset($dependencias)) { 
                                                foreach ($dependencias as $dependencia) {
                                                    echo "<option value='" . $dependencia->getIdDependencia() . "'>" . $dependencia->getDescripcion() . "</option>";
                                                }
                                            }
                                        ?>
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
                        </table>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>