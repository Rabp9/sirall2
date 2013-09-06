<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.js"></script>
        <script type="text/javascript" src="resources/js/funciones.js"></script>
        <script type="text/javascript" src="resources/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="resources/js/jquery.treeview.js"></script>
       
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/jquery.treeview.css"/>
            
        <script type="text/javascript">
            $(document).ready(function() {
                isRequired($('#txtNombres'));
                isRequired($('#txtDescripcion'));
                isRequired($('#txtApellidoMaterno'));
                setValue($('#txtIdDependencia'), <?php echo $nextID; ?>);
                isReadOnly($('#txtIdDependencia'));
                $('#txtDescripcion').focus();
                $('#btnDependenciaSuperior').button();
                $('#btnSeleccionar').button();
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                
                $( '#dependenciaSelect' ).dialog({
                    autoOpen: false,
                    modal: true,
                    width: 600,
                    show: {
                        effect: "blind",
                        duration: 1000
                    },
                    hide: {
                        effect: "explode",
                        duration: 1000
                    }
                });
                
                $('#btnDependenciaSuperior').click(function() {
                    $('#dependenciaSelect').dialog('open');
                });
                
                $("#ulDependencia").treeview({
                    animated: "fast",
                    collapsed: false,
                    unique: false,
                    persist: "cookie"
                });
                
                $('#ulDependencia li ').hover(function() {
                    $("#ulDependencia li a").removeClass('hover');
                    $(this).addClass('hover');
                }); 
                
                $("#ulDependencia li a").click(function() {
                    $("#ulDependencia li a").removeClass('selected');
                    $(this).addClass('selected');
                });
                
                $('#btnSeleccionar').click(function() {
                    var $dependenciaSeleccionada = $("#ulDependencia li a.selected");
                    var $redSeleccionada = $dependenciaSeleccionada.parents().filter($('li')).find($("a[title='Red']"));
                    $('#txtDependenciaSeleccionada').html($dependenciaSeleccionada.text() + " (" + $redSeleccionada.text() + ")");
                    var tipo = $dependenciaSeleccionada.attr('title');
                    $('#hdnRed').attr('value', $redSeleccionada.find('input').val());
                    if(tipo === 'Dependencia')
                        $('#hdnDependencia').attr('value', $dependenciaSeleccionada.find('input').val());
                    else
                        $('#hdnDependencia').attr('value', 0);
                    $('#dependenciaSelect').dialog('close');
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
                                <td><label for="btnDependenciaSuperior">Dependencia Superior</label></td>
                                <td>
                                    <button id="btnDependenciaSuperior" type="button">Seleccionar</button>
                                    <span id="txtDependenciaSeleccionada"></span>
                                    <input id="hdnRed" type="hidden" name="idRed" value=""/>
                                    <input id="hdnDependencia" type="hidden" name="superIdDependencia" value=""/>
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