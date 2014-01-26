<!-- File: /views/Mantenimiento/Area/Editar.php -->

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
        <script type="text/javascript" src="resources/js/template.areaSelect.js"></script>
        <script type="text/javascript" src="resources/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="resources/js/jquery.treeview.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                isRequired($('#txtNombres'));
                isRequired($('#txtDescripcion'));
                isRequired($('#txtApellidoMaterno'));
                setValue($('#txtIdArea'), '<?php echo $area->getIdArea(); ?>');
                setValue($('#txtDescripcion'), '<?php echo $area->getDescripcion(); ?>');
                setValue($('#txtaDireccion'), '<?php echo $area->getDireccion(); ?>');
                isReadOnly($('#txtIdArea'));
                $('#txtDescripcion').focus();
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                
                // INICIO Editar Seleccionar Area
                var idArea = '<?php echo $area->getIdArea(); ?>';
                $("#ulArea li button").not($("button[title='Establecimiento']")).find("input[value='" + idArea + "']").parent().parent().parent().parent().find('button:eq(0)').addClass('selected');
                var $areaSeleccionada = $("#ulArea li button.selected"); 
                var $establecimientoSeleccionada = $areaSeleccionada.parents().filter($('li')).find($("button[title='Establecimiento']"));
                $('#txtAreaSeleccionada').html($areaSeleccionada.text() + " (" + $establecimientoSeleccionada.text() + ")");
                $('#hdnEstablecimiento').val($establecimientoSeleccionada.find('input').val());
                if($establecimientoSeleccionada.find('input').val() !== $areaSeleccionada.find('input').val())
                    $('#hdnArea').val($areaSeleccionada.find('input').val());
                // FIN Editar Seleccionar Area       
                $("#chxDireccionDiferente").button().change(function() {
                    if($(this).prop('checked'))
                        $("#txtaDireccion").prop('disabled', false);
                    else {
                        $("#txtaDireccion").text("");
                        $("#txtaDireccion").prop('disabled', 'disabled');
                    }
                });
            });
        </script>
        <title>SIRALL2 - Editar Área</title>
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
                        <h2>Editar Área</h2>
                        <h4>Edita la Área</h4>
                    </hgroup>
                </header>
                <form id="frmEditarArea" method="POST" action="?controller=Area&action=EditarPOST">
                    <fieldset>
                        <legend>Editar Área</legend>
                        <table>
                            <tr>
                                <td><label for="txtIdArea"><abbr title="Código identificador">ID.</abbr> Area</label></td>
                                <td><input id="txtIdArea" type="text" name="idArea"/></td>
                            </tr>
                            <tr>
                                <td><label for="txtDescripcion">Descripción</label></td>
                                <td><input id="txtDescripcion" type="text" name="descripcion" placeholder="Escribe una descripción"/></td>  
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="chxDireccionDiferente" title="Especificar una Dirección diferente a la dirección del Establecimiento">Especificar una Dirección</label><input id="chxDireccionDiferente" type="checkbox" name="direccionDiferente" checked/>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="txtaDireccion">Dirección</label></td>
                                <td><textarea id="txtaDireccion" name="direccion" placeholder="Escribe una dirección"></textarea></td>  
                            </tr>
                            <tr>
                                <td><label for="btnAreaSuperior">Area Superior</label></td>
                                <td>
                                    <button id="btnAreaSuperior" type="button">Seleccionar</button>
                                    <span id="txtAreaSeleccionada"></span>
                                    <input id="hdnEstablecimiento" type="hidden" name="idEstablecimiento" value=""/>
                                    <input id="hdnArea" type="hidden" name="superIdArea" value=""/>
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
                                <td colspan="2"><a href="?controller=Area">Regresar</a></td>
                            </tr>
                        </table>
                       <div id="areaSelect" title="Seleccionar Area">         
                            <p>Selecciona un Área</p>
                            <?php
                                function tieneHijos($padre, $areas) {
                                    foreach ($areas as $area) {
                                        if($padre->getIdArea() == $area->getSuperIdArea()) 
                                            return true;
                                    }
                                    return false;
                                }
                                
                                function mostrarHijosEstablecimiento($padre, $areas) {
                                    if(is_array($areas)) {
                                        foreach ($areas as $area) {
                                            if($padre->getIdEstablecimiento() == $area->getIdEstablecimiento() && $area->getSuperIdArea() == null) {
                                                echo "<li><button type='button' title='Area'><input type='hidden' value='" . $area->getIdArea() ."'/>" . $area->getDescripcion() . "</button>";
                                                if(tieneHijos($area, $areas)) {
                                                    echo "<ul>";
                                                    mostrarHijos($area, $areas);
                                                    echo "</ul>";
                                                }
                                                echo "</li>";
                                            }
                                        }
                                    }
                                }
                                
                                function mostrarHijos($padre, $areas) {
                                    foreach ($areas as $area) {
                                        if($padre->getIdArea() == $area->getSuperIdArea()) {
                                            echo "<li><button type='button' title='Area'><input type='hidden' value='" . $area->getIdArea() ."'/>" . $area->getDescripcion() . "</button>";
                                            if(tieneHijos($area, $areas)) {
                                                echo "<ul>";
                                                mostrarHijos($area, $areas);
                                                echo "</ul>";
                                            }
                                            echo "</li>";
                                        }
                                    }
                                }
                                
                                if(is_array($establecimientos)) {
                                    echo "<ul id='ulArea' class='treeview-blue'>";
                                    foreach($establecimientos as $establecimiento) {
                                        echo "<li><button type='button' title='Establecimiento'><input type='hidden' value='" . $establecimiento->getIdEstablecimiento() ."'/>" . $establecimiento->getDescripcion() . "</button>";
                                        echo "<ul>";
                                        mostrarHijosEstablecimiento($establecimiento, $areas);
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