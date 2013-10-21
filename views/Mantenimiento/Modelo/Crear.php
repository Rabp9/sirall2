<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
      
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript" src="resources/js/template.funciones.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                isRequired($('#txtDescripcion'));
                isRequired($('#cboTipoEquipo'));
                isRequired($('#cboMarca'));
                setValue($('#txtIdModelo'), '<?php echo $nextID; ?>');
                isReadOnly($('#txtIdModelo'));
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $('#txtDescripcion').focus();
                
                // Tipo de Equipo
                var tipoEquipoTags = new Array();
                <?php
                    if($tipoEquipos) { 
                        foreach ($tipoEquipos as $tipoEquipo) {
                ?>
                        tipoEquipoTags.push('<?php echo $tipoEquipo->getIdTipoEquipo(); ?>');
                <?php
                        }
                    }
                ?>
                        
                $("#txtIdTipoEquipo").autocomplete({
                    source: tipoEquipoTags
                });
                $("#txtIdTipoEquipo").autocomplete({ autoFocus: true });
                $('#btnIdTipoEquipo').button({
                    icons: {
                        primary: "ui-icon-search"
                    },
                    text: false
                });
                $('#btnIdTipoEquipo').css('height', parseInt($("#txtIdTipoEquipo").css('height')) + 8);
                $("#txtIdTipoEquipo").css('width', parseInt($("#txtIdTipoEquipo").css('width')) - 48);
                
                        
                // Marca
                var marcaTags = new Array();
                <?php
                    if($marcas) { 
                        foreach ($marcas as $marca) {
                ?>
                        marcaTags.push('<?php echo $marca->getIdMarca(); ?>');
                <?php
                        }
                    }
                ?>
                        
                $("#txtIdMarca").autocomplete({
                    source: marcaTags
                });
                $("#txtIdMarca").autocomplete({ autoFocus: true });
                $('#btnIdMarca').button({
                    icons: {
                        primary: "ui-icon-search"
                    },
                    text: false
                });
                $('#btnIdMarca').css('height', parseInt($("#txtIdMarca").css('height')) + 8);
                $("#txtIdMarca").css('width', parseInt($("#txtIdMarca").css('width')) - 48);
                
            });
        </script>
        
        <title>SIRALL2 - Crear Modelo</title>
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
                        <h2>Crear Modelo</h2>
                        <h4>Crea un Modelo</h4>
                    </hgroup>
                </header>
                <form id="frmCrearModelo" method="POST" action="?controller=Modelo&action=CrearPOST">
                    <fieldset>
                        <legend>Crear Modelo</legend>
                        <table>
                            <tr>
                                <td><label for="txtIdModelo"><abbr title="Código identificador">ID.</abbr> Modelo</label></td>
                                <td><input id="txtIdModelo" type="text" name="idModelo"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><center>Tipo de Equipo</center></td>
                            </tr>
                            <tr>
                                <td><label for="txtIdTipoEquipo">Código identificador</label></td>
                                <td>
                                    <input id="txtIdTipoEquipo" type="text" name="idTipoEquipo">
                                    <button type="button" id="btnIdTipoEquipo"></button>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="txtTipoEquipo">Descripción</label></td>
                                <td><input id="txtTipoEquipo" type="text" readonly="true"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><center>Marca</center></td>
                            </tr>
                            <tr>
                                <td><label for="txtIdTipoEquipo">Código identificador</label></td>
                                <td>
                                    <input id="txtIdMarca" type="text" name="idMarca">
                                    <button type="button" id="btnIdMarca"></button>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="txtDescripcion">Descripción</label></td>
                                <td><input id="txtDescripcion" type="text" name="descripcion" placeholder="Escribe una descripción"></td>  
                            </tr>
                            <tr>
                                <td><label for="txtIndicacion">Indicación</label></td>
                                <td><textarea id="txtIndicacion" name="indicacion" placeholder="Escribe una indicación" ></textarea></td>  
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Modelo">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>