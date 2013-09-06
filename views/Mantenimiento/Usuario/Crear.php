<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
      
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.js"></script>
        <script type="text/javascript" src="resources/js/funciones.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
              //  isRequiusuario($('#txtDescripcion'));
               // setValue($('#txtIdUsuario'), <?php echo $nextID; ?>);
               // isReadOnly($('#txtIdUsuario'));
               // $('#btnEnviar').button();
              //  $('#btnBorrar').button();
              //  $('#txtDescripcion').focus();
                $('#asistente').tabs();
                
                $('div#asistente div:not(:first)').append("<button class='prev' type='button'>Anterior</button>");
                $('.prev').click(function() {
                    var selected = $("#asistente").tabs("option", "active");
                    $("#asistente").tabs("option", "active", selected - 1);
                });
                
                $('div#asistente div:not(:last)').append("<button class='next' type='button'>Siguiente</button>");
                $('.next').click(function() {
                    var selected = $("#asistente").tabs("option", "active");
                    $("#asistente").tabs("option", "active", selected + 1);
                });
            });
        </script>
        
        <title>SIRALL2 - Crear Usuario</title>
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
                        <h2>Crear Usuario</h2>
                        <h4>Crea un Usuario</h4>
                    </hgroup>
                </header>
                <form id="frmCrearUsuario" method="POST" action="?controller=Usuario&action=CrearPOST">
                    <fieldset>
                        <legend>Crear Usuario</legend>
                        <div id="asistente">
                            <ul>
                                <li><a href="#personal">Información personal</a></li>
                                <li><a href="#institucional">Información Institucional</a></li>
                                <li><a href="#sistema">Información del Sistema</a></li>
                            </ul>
                            <div id="personal">
                                <table>
                                    <tr>
                                        <td><label for="txtIdUsuario"><abbr title="Código identificador">ID.</abbr> Usuario</label></td>
                                        <td><input id="txtIdUsuario" type="text" name="idUsuario"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="txtNombres">Nombres</label></td>
                                        <td><input id="txtNombres" type="text" name="nombres" placeholder="Escribe el nombre del usuario"/></td>  
                                    </tr>
                                    <tr>
                                        <td><label for="txtApellidoPaterno">Apellido Paterno</label></td>
                                        <td><input id="txtApellidoPaterno" type="text" name="apellidoPaterno" placeholder="Escribe el apellido paterno"/></td>  
                                    </tr>
                                    <tr>
                                        <td><label for="txtApellidoMaterno">Apellido Materno</label></td>
                                        <td><input id="txtApellidoMaterno" type="text" name="apellidoMaterno" placeholder="Escribe el apellido materno"/></td>  
                                    </tr>
                                </table>
                            </div>
                            <div id="institucional">
                                <table>
                                    <tr>
                                        <td><label for="btnDependenciaSuperior">Dependencia Superior</label></td>
                                        <td>
                                            <button id="btnDependenciaSuperior" type="button">Seleccionar</button>
                                            <span id="txtDependenciaSeleccionada"></span>
                                            <input id="hdnRed" type="hidden" name="idRed" value=""/>
                                            <input id="hdnDependencia" type="hidden" name="superIdDependencia" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="txtCorreo">Correo Institucional</label></td>
                                        <td><input id="txtCorreo" type="text" name="correo" placeholder="Escribe el correo"/></td>  
                                    </tr>
                                    <tr>
                                        <td><label for="txtRpm">Rpm</label></td>
                                        <td><input id="txtRpm" type="tel" name="rpm" placeholder="Escribe el número de RPM"/></td>  
                                    </tr>
                                    <tr>
                                        <td><label for="txtAnexo">Anexo</label></td>
                                        <td><input id="txtAnexo" type="tel" name="anexo" placeholder="Escribe el número de anexo"/></td>  
                                    </tr>
                                </table>
                            </div>
                            <div id="sistema">
                                <table>
                                    <tr>
                                        <td><label for="txtUsername">Username</label></td>
                                        <td><input id="txtUsername" type="text" name="username" placeholder="Escribe el username"/></td>  
                                    </tr>
                                    <tr>
                                        <td><label for="txtPassword">Password</label></td>
                                        <td><input id="txtPassword" type="text" name="password" placeholder="Escribe el password"/></td>  
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <table>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Usuario">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>