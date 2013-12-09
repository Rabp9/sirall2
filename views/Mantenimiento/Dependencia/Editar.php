<!-- File: /views/Mantenimiento/Dependencia/Editar.php -->

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
                isRequired($('#txtDescripcion'));
                isRequired($('#txtApellidoMaterno'));
                setValue($('#txtIdDependencia'), '<?php echo $dependencia->getIdDependencia(); ?>');
                isReadOnly($('#txtIdDependencia'));
                $('#txtDescripcion').focus();
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                
                // INICIO Editar Seleccionar Dependencia
                var idDependencia = '<?php echo $dependencia->getIdDependencia(); ?>';
                $("#ulDependencia li button").not($("button[title='Establecimiento']")).find("input[value='" + idDependencia + "']").parent().parent().parent().parent().find('button:eq(0)').addClass('selected');
                var $dependenciaSeleccionada = $("#ulDependencia li button.selected"); 
                var $establecimientoSeleccionada = $dependenciaSeleccionada.parents().filter($('li')).find($("button[title='Establecimiento']"));
                $('#txtDependenciaSeleccionada').html($dependenciaSeleccionada.text() + " (" + $establecimientoSeleccionada.text() + ")");
                $('#hdnEstablecimiento').val($establecimientoSeleccionada.find('input').val());
                if($establecimientoSeleccionada.find('input').val() !== $dependenciaSeleccionada.find('input').val())
                    $('#hdnDependencia').val($dependenciaSeleccionada.find('input').val());
                // FIN Editar Seleccionar Dependencia
            });
        </script>
        <title>SIRALL2 - Editar Dependencia</title>
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
                        <h2>Editar Dependencia</h2>
                        <h4>Edita la Dependencia</h4>
                    </hgroup>
                </header>
                <form id="frmEditarDependencia" method="POST" action="?controller=Dependencia&action=EditarPOST">
                    <fieldset>
                        <legend>Editar Dependencia</legend>
                        <table>
                            <tr>
                                <td><label for="txtIdDependencia"><abbr title="Código identificador">ID.</abbr> Dependencia</label></td>
                                <td><input id="txtIdDependencia" type="text" name="idDependencia"></td>
                            </tr>
                            <tr>
                                <td><label for="txtDescripcion">Descripcion</label></td>
                                <td><input id="txtDescripcion" type="text" name="descripcion" placeholder="Escribe una descripción" value="<?php echo $dependencia->getDescripcion(); ?>"></td>  
                            </tr>
                            <tr>
                                <td><label for="btnDependenciaSuperior">Dependencia Superior</label></td>
                                <td>
                                    <button id="btnDependenciaSuperior" type="button">Seleccionar</button>
                                    <span id="txtDependenciaSeleccionada"></span>
                                    <input id="hdnEstablecimiento" type="hidden" name="idEstablecimiento" value=""/>
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
                                
                                function mostrarHijosEstablecimiento($padre, $dependencias) {
                                    if(is_array($dependencias)) {
                                        foreach ($dependencias as $dependencia) {
                                            if($padre->getIdEstablecimiento() == $dependencia->getIdEstablecimiento() && $dependencia->getSuperIdDependencia() == null) {
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
                                
                                if(is_array($establecimientos)) {
                                    echo "<ul id='ulDependencia' class='treeview-blue'>";
                                    foreach($establecimientos as $establecimiento) {
                                        echo "<li><button type='button' title='Establecimiento'><input type='hidden' value='" . $establecimiento->getIdEstablecimiento() ."'/>" . $establecimiento->getDescripcion() . "</button>";
                                        echo "<ul>";
                                        mostrarHijosEstablecimiento($establecimiento, $dependencias);
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