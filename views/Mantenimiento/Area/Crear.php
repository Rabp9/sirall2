<!-- File: /views/Mantenimiento/Area/Crear.php -->

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
                isRequired($('#txtDescripcion'));
                setValue($('#txtIdArea'), 'A????');
                isReadOnly($('#txtIdArea'));
                $('#txtDescripcion').focus();
                $('#btnBorrar').button();
                $('form').submit(function() {
                    if(!$('#txtAreaSeleccionada').text().length) {
                        alert('Debes elegir un Área');
                        return false;
                    }
                });
                $("#sltEstablecimiento").change(function() {
                    <?php
                        foreach ($establecimientos as $establecimiento) {
                    ?>
                                alert("asddas")
                    <?php
                        }
                    ?>
                });
                $("#chxDireccionDiferente").button().change(function() {
                    if($(this).prop('checked'))
                        $("#txtaDireccion").prop('disabled', false);
                    else
                        $("#txtaDireccion").prop('disabled', 'disabled');
                });
            });
        </script>
        <title>SIRALL2 - Crear Área</title>
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
                        <h2>Crear Área</h2>
                        <h4>Crea una Área</h4>
                    </hgroup>
                </header>
                <form id="frmCrearArea" method="POST" action="?controller=Area&action=CrearPOST">
                    <fieldset>
                        <legend>Crear Área</legend>
                        <table>
                            <tr>
                                <td><label for="txtIdArea"><abbr title="Código identificador">ID.</abbr> Área</label></td>
                                <td><input id="txtIdArea" type="text" name="idArea"></td>
                            </tr>
                            <tr>
                                <td><label for="txtDescripcion">Descripcion</label></td>
                                <td><input id="txtDescripcion" type="text" name="descripcion" placeholder="Escribe una descripción"></td>  
                            </tr>
                            <!--
                            <tr>
                                <td><label for="sltEstablecimiento">Establecimiento</label></td>
                                <td>
                                    <select id="sltEstablecimiento" name="idEstablecimiento" required>
                                        <option disabled selected value="">Selecciona un Establecimiento</option>
                                        <?php
                                           /* foreach ($establecimientos as $establecimiento) {
                                                echo "<option value='" . $establecimiento->getIdEstablecimiento() . "'>" . $establecimiento->getDescripcion() . "</option>";                                   
                                            }*/
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            -->
                            <tr>
                                <td colspan="2">
                                    <label for="chxDireccionDiferente" title="Especificar una Dirección diferente a la dirección del Establecimiento">Especificar una Dirección</label><input id="chxDireccionDiferente" type="checkbox" name="direccionDiferente"/>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="txtaDireccion">Dirección</label></td>
                                <td><textarea id="txtaDireccion" name="direccion" placeholder="Escribe una dirección" disabled></textarea></td>  
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
                        <div id="areaSelect" title="Seleccionar Área">         
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
                                            if($padre->getIdEstablecimiento() == $area->getIdEstablecimiento() && $area->getSuperIdArea() == "") {
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