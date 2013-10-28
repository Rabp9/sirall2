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
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                
                // INICIO Seleccionar Dependencia
                $('#btnSeleccionar').click(function() {
                    var $dependenciaSeleccionada = $("#ulDependencia li button.selected");
                    if($($dependenciaSeleccionada).length) {
                        $.ajax({
                            url: 'Index.php',
                            type: 'GET',
                            data: {
                                controller: 'Usuario',
                                action: 'usuarioAJAX',
                                idDependencia: $('#hdnDependencia').val()
                            },
                            success: function(data) {
                                $('#cboUsuario').html("<option disabled selected value=''>Selecciona un Usuario</option>");
                                $(data).find('Usuario').each(function() {
                                    var option = new Option($(this).find('apellidoPaterno').text() + ' ' + $(this).find('apellidoMaterno').text() + ', ' + $(this).find('nombres').text(), $(this).find('idUsuario').text());
                                    $('#cboUsuario').append(option);
                                });
                            }
                        })
                    }
                });
                // FIN Seleccionar Dependencia
            });
        </script>
        
        <title>SIRALL2 - Asignar Jefe de Dependencia</title>
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
                        <h2>Asignar Jefe de Dependencia</h2>
                        <h4>Asigna el jefe o responsable de una Dependencia</h4>
                    </hgroup>
                </header>
                <form id="frmAsignaJefeDependencia" method="POST" action="?controller=AsignarJefeDependencia&action=AsignarJefeDependenciaPOST">
                    <fieldset>
                        <legend>Asignación de Jefe</legend>
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
                                <td><label for="cboUsuario">Usuario</label></td>
                                <td>
                                    <select id="cboUsuario" name="idUsuario">
                                        <option disabled selected value="">Selecciona un Usuario</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
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
                                                echo "<li><button type='button' title='Dependencia'><input type='hidden' value='" . $dependencia->getIdDependencia() ."'/>" . $dependencia->getDescripcion() . "</button>";
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
                                            echo "<li><button type='button' title='Dependencia'><input type='hidden' value='" . $dependencia->getIdDependencia() ."'/>" . $dependencia->getDescripcion() . "</button>";
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
                                        echo "<li><button type='button' title='Red'><input type='hidden' value='" . $red->getIdRed() ."'/>" . $red->getDescripcion() . "</button>";
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