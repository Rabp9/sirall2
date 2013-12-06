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
        <script type="text/javascript" src="resources/js/template.lista.js"></script>
        <script type="text/javascript" src="resources/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#btnReportar').button({
                    icons: {
                        primary: "ui-icon-search"
                    }
                }).focus();
                $('#numberNumRegistros').attr({'max' : <?php echo $max; ?>, 'min' : 0});
                $('#numberNumRegistros').val(<?php echo $max; ?>);
                
                $('#btnReportarBaja').button({
                    icons: {
                        primary: "ui-icon-search"
                    }
                }).focus();
                $('#numberNumRegistrosBaja').attr({'max' : <?php echo $maxBaja; ?>, 'min' : 0});
                $('#numberNumRegistrosBaja').val(<?php echo $maxBaja; ?>);
                
                // INICIO Tipo de Equipo
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
                    source: 
                        function(request, response) {
                            var results = $.ui.autocomplete.filter(tipoEquipoTags, request.term);

                            response(results.slice(0, 10));
                        }
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
                
                var comprobarTipoEquipo = function() {
                    var idTipoEquipo = $('#txtIdTipoEquipo').val();
                    var r = false;
                    <?php
                        if($tipoEquipos) { 
                            foreach ($tipoEquipos as $tipoEquipo) {
                    ?>
                                if(idTipoEquipo === '<?php echo $tipoEquipo->getIdTipoEquipo(); ?>') {
                                    $('#txtTipoEquipo').val('<?php echo $tipoEquipo->getDescripcion(); ?>');
                                    r = true;
                                }
                    <?php
                            }
                    ?>
                                if(!r)  $('#txtTipoEquipo').val('');
                    <?php
                        }
                    ?>
                }; 
                
                $('#txtIdTipoEquipo').keyup(comprobarTipoEquipo);
                $('#txtIdTipoEquipo').on( "autocompleteclose", comprobarTipoEquipo);
                
                $( '#divTipoEquipo' ).dialog({
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
                $('#btnIdTipoEquipo').click(function() {
                    $('#divTipoEquipo').dialog('open');
                });
                // FIN Tipo de Equipo
            });
        </script>
        
        <title>SIRALL2 - Reporte de Equipos</title>
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
                        <h2>Reporte de Equipo</h2>
                        <h4>Reportar la lista de Equipos</h4>
                    </hgroup>
                </header>
                <form id="frmReporteEquipoGeneral" method="POST" action="?controller=Reporte&action=ReporteEquiposPOST">
                    <fieldset>
                        <legend>Reporte General</legend>
                        <table>
                            <tr>
                                <td><label for="numberNumRegistros">Número de registros a mostrar:</label></td>
                                <td><input id="numberNumRegistros" type="number" name="numRegistros"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button id="btnReportar" type="submit">Reportar</button>
                                </td>
                            </tr>
                        </table>
                    </fieldset>                            
                </form>
                <form id="frmReporteEquipoDetalle" method="POST" action="?controller=Reporte&action=ReporteEquiposPOST">
                    <fieldset>
                        <legend>Reporte Detallado</legend>
                        <fieldset>
                            <legend>Tipo de Equipo</legend>
                            <table>
                                 <tr>
                                    <td><label for="txtIdTipoEquipo">Código identificador</label></td>
                                    <td>
                                        <input id="txtIdTipoEquipo" type="text" name="idTipoEquipo">
                                        <button type="button" id="btnIdTipoEquipo"></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="txtTipoEquipo">Tipo de Equipo</label></td>
                                    <td><input id="txtTipoEquipo" type="text" readonly="true"></td>
                                </tr>
                            </table>
                        </fieldset>
                    </fieldset>                         
                </form>
                <!-- Dialog Modal para Tipo de Equipo -->
                <div id="divTipoEquipo" title="Elegir un Tipo de Equipo">
                    <table class="tblLista">
                        <thead>
                            <tr>
                                <th><abbr title="Código identificador">ID.</abbr> Tipo Equipo</th>
                                <th>Descripción</th>
                                <th>N° Modelos</th>
                                <th>N° Equipos</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(is_array($vwTipoEquipos)) {
                                    foreach ($vwTipoEquipos as $vwTipoEquipo) {
                            ?>
                            <tr>
                                <td><?php echo $vwTipoEquipo->getIdTipoEquipo(); ?></td>
                                <td><?php echo $vwTipoEquipo->getDescripcion(); ?></td>
                                <td><?php echo $vwTipoEquipo->getNroModelos(); ?></td>
                                <td><?php echo $vwTipoEquipo->getNroEquipos(); ?></td>
                                <td><button class="btnSeleccionarTipoEquipo"></button></td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <script type="text/javascript">
                    $('.btnSeleccionarTipoEquipo').button({
                        icons: {
                            primary: "ui-icon-check"
                        },
                        text: false
                    }).click(function() {
                        var idTipoEquipo = $(this).parents('tr').find('td').eq(0).text();
                        setValue($('#txtIdTipoEquipo'), idTipoEquipo);
                        //comprobarTipoEquipo();
                        var idTipoEquipo = $('#txtIdTipoEquipo').val();
                        var r = false;
                        <?php
                            if($tipoEquipos) { 
                                foreach ($tipoEquipos as $tipoEquipo) {
                        ?>
                                    if(idTipoEquipo === '<?php echo $tipoEquipo->getIdTipoEquipo(); ?>') {
                                        $('#txtTipoEquipo').val('<?php echo $tipoEquipo->getDescripcion(); ?>');
                                        r = true;
                                    }
                        <?php
                                }
                        ?>
                                    if(!r)  $('#txtTipoEquipo').val('');
                        <?php
                            }
                        ?>
                        $('#divTipoEquipo').dialog('close');
                    });
                </script>
                <form id="frmReporteEquipoBaja" method="POST" action="?controller=Reporte&action=ReporteEquiposBajaPOST">
                    <fieldset>
                        <legend>Reporte Equipos de baja</legend>
                        <table>
                            <tr>
                                <td><label for="numberNumRegistrosBaja">Número de registros a mostrar:</label></td>
                                <td><input id="numberNumRegistrosBaja" type="number" name="numRegistros"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button id="btnReportarBaja" type="submit">Reportar</button>
                                </td>
                            </tr>
                        </table>
                    </fieldset>                            
                </form>
            </article>
        </section>
    </body>
</html>