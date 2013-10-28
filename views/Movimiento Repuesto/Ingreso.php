<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/jquery.dataTables_themeroller.css"/>
      
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript" src="resources/js/template.funciones.js"></script>
        <script type="text/javascript" src="resources/js/template.datepicker-es.js"></script>
        <script type="text/javascript" src="resources/js/template.lista.js"></script>
        <script type="text/javascript" src="resources/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                isRequired($('#nmbCantidad'));
                isRequired($('#txtFecha'));
                setValue($('#txtFecha'), '<?php echo date('d/m/Y'); ?>');
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $("#txtFecha").datepicker(
                { 
                    changeYear: true,
                    changeMonth: true
                });
                $('#txtIdRepuesto').focus();
                
                // INICIO Repuesto
                var repuestoTags = new Array();
                <?php
                    if($repuestos) { 
                        foreach ($repuestos as $repuesto) {
                ?>
                        repuestoTags.push('<?php echo $repuesto->getIdRepuesto(); ?>');
                <?php
                        }
                    }
                ?>
                        
                $("#txtIdRepuesto").autocomplete({
                    source: repuestoTags
                });
                $("#txtIdRepuesto").autocomplete({ autoFocus: true });
                $('#btnIdRepuesto').button({
                    icons: {
                        primary: "ui-icon-search"
                    },
                    text: false
                });
                $('#btnIdRepuesto').css('height', parseInt($("#txtIdRepuesto").css('height')) + 8);
                $("#txtIdRepuesto").css('width', parseInt($("#txtIdRepuesto").css('width')) - 48);
                
                var comprobarRepuesto = function() {
                    var idRepuesto = $('#txtIdRepuesto').val();
                    var r = false;
                    <?php
                        if($repuestos) { 
                            foreach ($repuestos as $repuesto) {
                    ?>
                                if(idRepuesto === '<?php echo $repuesto->getIdRepuesto(); ?>') {
                                    $('#txtRepuesto').val('<?php echo $repuesto->getDescripcion(); ?>');
                                    $('#spnUnidadMedida').html('<?php echo $repuesto->getUnidadMedida()  ; ?>');
                                    r = true;
                                }
                    <?php
                            }
                    ?>
                                if(!r)  {
                                    $('#txtRepuesto').val('');
                                    $('#spnUnidadMedida').html('');
                                }
                    <?php
                        }
                    ?>
                }; 
                
                $('#txtIdRepuesto').keyup(comprobarRepuesto);
                $('#txtIdRepuesto').on( "autocompleteclose", comprobarRepuesto);
                
                $( '#divRepuesto' ).dialog({
                    autoOpen: false,
                    modal: true,
                    height: 400,
                    width: 1050,
                    show: {
                        effect: "blind",
                        duration: 1000
                    },
                    hide: {
                        effect: "explode",
                        duration: 1000
                    },
                    buttons: {
                        "Cancelar": function() {
                            $(this).dialog("close");
                        }
                    }
                });
                $('#btnIdRepuesto').click(function() {
                    $('#divRepuesto').dialog('open');
                });
                $('.btnSeleccionarRepuesto').button({
                    icons: {
                        primary: "ui-icon-check"
                    },
                    text: false
                }).click(function() {
                    var idRepuesto = $(this).parents('tr').find('td').eq(0).text();
                    setValue($('#txtIdRepuesto'), idRepuesto);
                    comprobarRepuesto();
                    $('#divRepuesto').dialog('close');
                });
                // FIN Repuesto
            });
        </script>
        
        <title>SIRALL2 - Ingreso de Repuestos</title>
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
                        <h2>Ingreso de Repuestos</h2>
                        <h4>Registra un ingreso de repuestos</h4>
                    </hgroup>
                </header>
                <form id="frmIngresoRepuesto" method="POST" action="?controller=MovimientoRepuesto&action=IngresoPOST">
                    <fieldset>
                        <legend>Ingreso de Repuestos</legend>
                        <fieldset>
                            <legend>Repuesto</legend>
                            <table>
                                 <tr>
                                    <td><label for="txtIdRepuesto">Código identificador</label></td>
                                    <td>
                                        <input id="txtIdRepuesto" type="text" name="idRepuesto">
                                        <button type="button" id="btnIdRepuesto"></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="txtRepuesto">Repuesto</label></td>
                                    <td><input id="txtRepuesto" type="text" readonly="true"></td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Detalle</legend>
                            <table>
                                 <tr>
                                    <td><label for="nmbCantidad">Cantidad</label></td>
                                    <td>
                                        <input id="nmbCantidad" type="number" min="0" value="1" name="cantidad">
                                        <span id="spnUnidadMedida"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="txtFecha">Fecha</label></td>
                                    <td><input id="txtFecha" type="text" name="fecha"></td>
                                </tr>
                                <tr>
                                    <td><label for="txt">Observación</label></td>
                                    <td><textarea id="txtFecha" name="observacion"></textarea></td>
                                </tr>
                            </table>
                        </fieldset>
                        <table>
                            <tr>
                                <td colspan="2">
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                        </table>
                    </fieldset>                          
                    <!-- Dialog Modal para Repuesto -->
                    <div id="divRepuesto" title="Elegir una Repuesto">
                        <table class="tblLista">
                            <thead>
                                <tr>
                                    <th><abbr title="Código identificador">ID.</abbr> Repuesto</th>
                                    <th>Descripción</th>
                                    <th>Unidad de Medida</th>
                                    <th>Stock</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($vw_repuestos)) {
                                        while ($vw_repuesto = $vw_repuestos->fetch()) {
                                ?>
                                <tr>
                                    <td><?php echo $vw_repuesto['idRepuesto']; ?></td>
                                    <td><?php echo $vw_repuesto['Repuesto']; ?></td>
                                    <td><?php echo $vw_repuesto['unidadMedida']; ?></td>
                                    <td><?php echo $vw_repuesto['stock']; ?></td>
                                    <td><button class="btnSeleccionarRepuesto"></button></td>
                                </tr>
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </article>
        </section>
    </body>
</html>