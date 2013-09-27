<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/jquery.treeview.css"/>
      
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript" src="resources/js/template.funciones.js"></script>
        <script type="text/javascript" src="resources/js/template.dependenciaSelect.js"></script>
        <script type="text/javascript" src="resources/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="resources/js/jquery.treeview.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                isRequired($('#txtNombres'));
                isRequired($('#txtApellidoPaterno'));
                isRequired($('#txtApellidoMaterno'));
                isRequired($('#cboRol'));
                setValue($('#txtIdUsuario'), <?php echo $usuario->getIdUsuario(); ?>);
                setValue($('#txtNombres'), '<?php echo $usuario->getNombres(); ?>');
                setValue($('#txtApellidoPaterno'), '<?php echo $usuario->getApellidoPaterno(); ?>');
                setValue($('#txtApellidoMaterno'), '<?php echo $usuario->getApellidoMaterno(); ?>');
                setValue($('#txtCorreo'), '<?php echo $usuario->getCorreo(); ?>');
                setValue($('#txtRpm'), '<?php echo $usuario->getRpm(); ?>');
                setValue($('#txtAnexo'), '<?php echo $usuario->getAnexo(); ?>');
                setValue($('#txtUsername'), '<?php echo $usuario->getUsername(); ?>');
                isReadOnly($('#txtIdUsuario'));
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $('#txtDescripcion').select();   
                
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
                
                $('button.next').button();
                $('button.prev').button();
                
                var idDependencia = <?php echo $usuario->getIdDependencia(); ?>;
                $("#ulDependencia li a").not($("a[title='Red']")).find("input[value='" + idDependencia + "']").parent().parent().find('a:eq(0)').addClass('selected');
                var $dependenciaSeleccionada = $("#ulDependencia li a.selected"); 
                var $redSeleccionada = $dependenciaSeleccionada.parents().filter($('li')).find($("a[title='Red']"));
                $('#txtDependenciaSeleccionada').html($dependenciaSeleccionada.text() + " (" + $redSeleccionada.text() + ")");
    
            });
        </script>
        
        <title>SIRALL2 - Editar Usuario</title>
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
                        <h2>Editar Usuario</h2>
                        <h4>Edita el Usuario</h4>
                    </hgroup>
                </header>
                <form id="frmEditarrUsuario" method="POST" action="?controller=Usuario&action=EditarPOST">
                    <fieldset>
                        <legend>Editar Usuario</legend>
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
                                            <input id="hdnDependencia" type="hidden" name="idDependencia" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="txtCorreo">Correo Institucional</label></td>
                                        <td><input id="txtCorreo" type="text" name="correo" placeholder="Escribe el correo"/></td>  
                                    </tr>
                                    <tr>
                                        <td><label for="txtRpm">RPM</label></td>
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
                                        <td><label for="cboRol">Rol</label></td>
                                        <td>
                                            <select id="cboRol" name="idRol">   
                                                <option disabled selected value="">Selecciona un Rol</option>
                                                <?php 
                                                    if($roles) { 
                                                        foreach ($roles as $rol) {
                                                            if($rol->getIdRol() == $usuario->getIdRol())
                                                                echo "<option value='" . $rol->getIdRol() . "' selected>" . $rol->getDescripcion() . "</option>";
                                                            else
                                                                echo "<option value='" . $rol->getIdRol() . "'>" . $rol->getDescripcion() . "</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </td>  
                                    </tr>
                                    <tr>
                                        <td><label for="txtUsername">Username</label></td>
                                        <td><input id="txtUsername" type="text" name="username" placeholder="Escribe el username"/></td>  
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
                        <div id="dependenciaSelect" title="Seleccionar Dependencia">         
                            <p>Selecciona una Dependencia</p>
                            <?php
                                function tieneHijos($padre, $dependencias) {
                                    foreach ($dependencias as $dependencia) {
                                        if($padre->getIdDependencia() == $dependencia->getSuperIdDependencia()) 
                                            return true;
                                    }
                                    return false;
                                }
                                
                                function mostrarHijosRed($padre, $dependencias) {
                                    if(is_array($dependencias)) {
                                        foreach ($dependencias as $dependencia) {
                                            if($padre->getIdRed() == $dependencia->getIdRed() && $dependencia->getSuperIdDependencia() == null) {
                                                echo "<li><a title='Dependencia'><input type='hidden' value='" . $dependencia->getIdDependencia() ."'/>" . $dependencia->getDescripcion() . "</a>";
                                                if(tieneHijos($dependencia, $dependencias)) {
                                                    echo "<ul>";
                                                    mostrarHijos($dependencia, $dependencias);
                                                    echo "</ul>";
                                                }
                                                echo "</li>";
                                            }
                                        }
                                    }
                                }
                                
                                function mostrarHijos($padre, $dependencias) {
                                    foreach ($dependencias as $dependencia) {
                                        if($padre->getIdDependencia() == $dependencia->getSuperIdDependencia()) {
                                            echo "<li><a title='Dependencia'><input type='hidden' value='" . $dependencia->getIdDependencia() ."'/>" . $dependencia->getDescripcion() . "</a>";
                                            if(tieneHijos($dependencia, $dependencias)) {
                                                echo "<ul>";
                                                mostrarHijos($dependencia, $dependencias);
                                                echo "</ul>";
                                            }
                                            echo "</li>";
                                        }
                                    }
                                }
                                
                                if(is_array($redes)) {
                                    echo "<ul id='ulDependencia' class='treeview-blue'>";
                                    foreach($redes as $red) {
                                        echo "<li><a title='Red'><input type='hidden' value='" . $red->getIdRed() ."'/>" . $red->getDescripcion() . "</a>";
                                        echo "<ul>";
                                        mostrarHijosRed($red, $dependencias);
                                        echo "</ul>";
                                        echo "</li>";
                                    }
                                    echo "</ul>";
                                }
                            ?>
                            <button id="btnSeleccionar" type="button">Seleccionar</button>
                        </div>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>