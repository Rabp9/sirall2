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
                $('#chbDependencia').button();
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $('#chbDependencia').change(function(){
                    if($(this).is(':checked'))
                        $('#cbo').css('display', 'table-cell');
                    else
                        $('#cbo').css('display', 'none');
                });
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
                $('.btnSeleccionarTipoEquipo').button({
                    icons: {
                        primary: "ui-icon-check"
                    },
                    text: false
                }).click(function() {
                    var idTipoEquipo = $(this).parents('tr').find('td').eq(0).text();
                    setValue($('#txtIdTipoEquipo'), idTipoEquipo);
                    comprobarTipoEquipo();
                    cboModelo();
                    $('#divTipoEquipo').dialog('close');
                });
                // FIN Tipo de Equipo
                //
                //
                // INICIO Marca
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
                $('#txtIdMarca').css('width', parseInt($("#txtIdMarca").css('width')) - 48);
                var comprobarMarca = function() {
                    var idMarca = $('#txtIdMarca').val();
                    var r = false;
                    <?php
                        if($marcas) { 
                            foreach ($marcas as $marca) {
                    ?>
                                if(idMarca === '<?php echo $marca->getIdMarca(); ?>') {
                                    $('#txtMarca').val('<?php echo $marca->getDescripcion(); ?>');
                                    r = true;
                                }
                    <?php
                            }
                    ?>
                                if(!r)  $('#txtMarca').val('');
                    <?php
                        }
                    ?>
                }; 
                
                $('#txtIdMarca').keyup(comprobarMarca);
                $('#txtIdMarca').on( "autocompleteclose", comprobarMarca); 
                
                $( '#divMarca' ).dialog({
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
                $('#btnIdMarca').click(function() {
                    $('#divMarca').dialog('open');
                });
                $('.btnSeleccionarMarca').button({
                    icons: {
                        primary: "ui-icon-check"
                    },
                    text: false
                }).click(function() {
                    var idMarca = $(this).parents('tr').find('td').eq(0).text();
                    setValue($('#txtIdMarca'), idMarca);
                    comprobarMarca();
                    cboModelo();
                    $('#divMarca').dialog('close');
                });
                // FIN Marca
                //
                // 
                // INICIO Estilizar Tabla
                (function ($) {
                $.fn.styleTable = function (options) {
                    var defaults = {
                        css: 'ui-styled-table'
                    };
                    options = $.extend(defaults, options);

                    return this.each(function () {
                        $this = $(this);
                        $this.addClass(options.css);

                        $this.on('mouseover mouseout', 'tbody tr', function (event) {
                            $(this).children().toggleClass("ui-state-hover",
                                                           event.type == 'mouseover');
                        });

                        $this.find("th").addClass("ui-widget-header");
                        $this.find("td").addClass("ui-widget-content");
                        $this.find("tr:last-child").addClass("last-child");
                    });
                };
                })(jQuery);
                $('#tblLote').styleTable(event);
                // FIN Estilizar Tabla
                // 
                // 
                // INICIO Modelo
                var cboModelo = function() {
                    $.ajax({
                        url: 'Index.php',
                        type: 'GET',
                        data: {
                            controller: 'Modelo',
                            action: 'modeloAJAX',
                            idMarca: $('#txtIdMarca').val(),
                            idTipoEquipo: $('#txtIdTipoEquipo').val()
                        },
                        success: function(data) {
                            $('#cboModelo').html("<option disabled selected value=''>Selecciona un Modelo</option>");
                            $(data).find('Modelo').each(function() {
                                var option = new Option($(this).find('descripcion').text(), $(this).find('idModelo').text());
                                $('#cboModelo').append(option);
                            });
                        }
                    })
                }; 
                $('#txtIdTipoEquipo').on( "autocompleteclose", cboModelo);
                $('#txtIdMarca').on( "autocompleteclose", cboModelo);
                // FIN cboModelo
                //
                //
                // INICIO Validar Form
                $('#frmNuevoLote').submit(function() {
                    if($('#txtTipoEquipo').val() === '') {
                        alert('Ingrese un tipo de equipo');
                        $('#txtIdTipoEquipo').focus();
                        return false;
                    }
                    if($('#txtMarca').val() === '') {
                        alert('Ingrese una marca');
                        $('#txtIdMarca').focus();
                        return false;
                    }   
                });
                // FIN Validar Form
            });
            
            // INICIO presionar tecla
            function teclaPress(e) {
                var $this = $(e.target);
                var row_index = $this.parent().parent().index();
                var rows_count = $('#tblLote tbody tr').length;
                if(row_index === (rows_count - 1) && $this.val() !== '')
                    $('#tblLote tbody').append("<tr><td><input type='text' value='' onkeyup='teclaPress(event);' name='codigoPatrimonial[]'></td><td><input type='text' value='' name='serie[]'></td></tr>");
                if(row_index === (rows_count - 2) && $this.val() === '')
                    $('#tblLote tbody tr:eq(' + (row_index - 1) + ')').remove();
            };
            // FIN presionar tecla
        </script>
        
        <title>SIRALL2 - Nuevo Lote</title>
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
                        <h2>Nuevo Lote</h2>
                        <h4>Registra un nuevo Lote de equipos</h4>
                    </hgroup>
                </header>
                <form id="frmNuevoLote" method="POST" action="?controller=NuevoLote&action=NuevoLotePOST">
                    <fieldset>
                        <legend>Nuevo Lote</legend>
                        <div class="fieldset12">
                            <div class="fieldset1">
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
                                <fieldset>
                                    <legend>Marca</legend>
                                    <table>
                                         <tr>
                                            <td><label for="txtIdMarca">Código identificador</label></td>
                                            <td>
                                                <input id="txtIdMarca" type="text" name="idMarca">
                                                <button type="button" id="btnIdMarca"></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="txtMarca">Marca</label></td>
                                            <td><input id="txtMarca" type="text" readonly="true"></td>
                                        </tr>
                                    </table>
                                </fieldset>
                                <fieldset>
                                    <legend>Equipos</legend>
                                    <table>
                                        <tr>
                                            <td><label for="cboModelo">Modelo</label></td>
                                            <td>
                                                <select id="cboModelo" name="idModelo">
                                                    <option disabled selected value="">Selecciona un Modelo</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="txtIndicacion">Indicación</label></td>
                                            <td><textarea id="txtIndicacion" name="indicacion" placeholder="Escribe una indicación" ></textarea></td>  
                                        </tr>
                                    </table>
                                </fieldset>
                            </div>
                            <div class="fieldset2 tblIngresoAutomatico">
                                <table id="tblLote">  
                                    <caption>Ingrese el Código Patrimonial y la serie del Equipo</caption>
                                    <thead>
                                        <tr>
                                            <th>Código Patrimonial</th>
                                            <th>Serie</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" value="" onkeyup="teclaPress(event);" name="codigoPatrimonial[]"></td>
                                            <td><input type="text" value="" name="serie[]"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <table>
                            <tr>
                                <td colspan="2">
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                        </table>
                    </fieldset>             
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
                                    if(isset($vw_tipoEquipos)) {
                                        while ($vw_tipoEquipo = $vw_tipoEquipos->fetch()) {
                                ?>
                                <tr>
                                    <td><?php echo $vw_tipoEquipo['idTipoEquipo']; ?></td>
                                    <td><?php echo $vw_tipoEquipo['descripcion']; ?></td>
                                    <td><?php echo $vw_tipoEquipo['Nro Modelos']; ?></td>
                                    <td><?php echo $vw_tipoEquipo['Nro Equipos']; ?></td>
                                    <td><button class="btnSeleccionarTipoEquipo"></button></td>
                                </tr>
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Dialog Modal para Marca -->
                    <div id="divMarca" title="Elegir una Marca">
                        <table class="tblLista">
                            <thead>
                                <tr>
                                    <th><abbr title="Código identificador">ID.</abbr> Marca</th>
                                    <th>Descripción</th>
                                    <th>N° Modelos</th>
                                    <th>N° Equipos</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($vw_marcas)) {
                                        while ($vw_marca = $vw_marcas->fetch()) {
                                ?>
                                <tr>
                                    <td><?php echo $vw_marca['idMarca']; ?></td>
                                    <td><?php echo $vw_marca['descripcion']; ?></td>
                                    <td><?php echo $vw_marca['Nro Modelos']; ?></td>
                                    <td><?php echo $vw_marca['Nro Equipos']; ?></td>
                                    <td><button class="btnSeleccionarMarca"></button></td>
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