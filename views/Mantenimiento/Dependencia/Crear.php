<!-- File: /views/Mantenimiento/Dependencia/Crear.php -->

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
                isRequired($('#txtDescripcion'));
                setValue($('#txtIdDependencia'), '<?php echo $nextID; ?>');
                isReadOnly($('#txtIdDependencia'));
                $('#txtDescripcion').focus();
                $('#btnBorrar').button();
                $('form').submit(function() {
                    if(!$('#txtDependenciaSeleccionada').text().length) {
                        alert('Debes elegir una dependencia');
                        return false;
                    }
                });
                $("#sltEstablecimiento").change(function() {
                    var idEstablecimiento = $("#sltEstablecimiento").val();
                    $.ajax({
                        url: 'index.php',
                        type: "GET",
                        data: {
                            controller: 'Dependencia',
                            action: 'DependenciasByEstablecimiento',
                            idEstablecimiento: idEstablecimiento
                        },
                        success: function(data) {
                            $(data).find("Dependencia").each(function() {
                                var idDependencia = $(this).find("idDependencia");
                                var liDependencia = "<li><button type='button' title='Dependencia'><input type='hidden' value='" + idDependencia + "'/>" + idDependencia + "</button></li>";
                                $("#ulDependencia").append("<li><button type='button' title='Dependencia'>aa</button><ul><li>dsadas</li></ul></li>");
                            });
                        }
                    });
                    // obtener lista de dependencias que son de establecimiento seleccionado
                    // por cada dependencia mostrar sus subdependencias
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
                                <td><label for="sltEstablecimiento">Establecimiento</label></td>
                                <td>
                                    <select id="sltEstablecimiento" name="idEstablecimiento">
                                        <option disabled selected value="">Selecciona un Establecimiento</option>
                                        <?php
                                            if(is_array($establecimientos)) {
                                                foreach ($establecimientos as $establecimiento) {
                                                    echo "<option value='" . $establecimiento->getIdEstablecimiento() . "'>" . $establecimiento->getDescripcion() . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="btnDependenciaSuperior">Dependencia Superior</label></td>
                                <td>
                                    <button id="btnDependenciaSuperior" type="button">Seleccionar</button>
                                    <span id="txtDependenciaSeleccionada"></span>´
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
                            <ul id='ulDependencia' class='treeview-blue'>
                            </ul>
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
                            ?>
                            <button id="btnSeleccionar" type="button">Seleccionar</button>
                        </div>
                    </fieldset>        
                </form>
            </article>
        </section>
    </body>
</html>