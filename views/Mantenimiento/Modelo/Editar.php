<!-- File: /views/Mantenimiento/Modelo/Editar.php -->

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
                isRequiestablecimiento($('#txtDescripcion'));  
                setValue($('#txtIdTipoEquipo'), '<?php echo $tipoEquipo->getIdTipoEquipo(); ?>');
                setValue($('#txtTipoEquipo'), '<?php echo $tipoEquipo->getDescripcion(); ?>');
                setValue($('#txtIdMarca'), '<?php echo $marca->getIdMarca(); ?>');
                setValue($('#txtMarca'), '<?php echo $marca->getDescripcion(); ?>');
                setValue($('#txtIdModelo'), '<?php echo $modelo->getIdModelo(); ?>');
                setValue($('#txtDescripcion'), '<?php echo $modelo->getDescripcion(); ?>');
                setValue($('#txtIndicacion'), '<?php echo $modelo->getIndicacion(); ?>');
                isReadOnly($('#txtIdModelo'));
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $('#txtIdTipoEquipo').select();
                
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
                    source: 
                        function(request, response) {
                            var results = $.ui.autocomplete.filter(marcaTags, request.term);

                            response(results.slice(0, 10));
                        }
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
                // FIN Marca
                //
                //
                // INICIO Validar
                $('#frmEditarModelo').submit(function() {
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
                // FIN Validar
            });
        </script>
        
        <title>SIRALL2 - Editar Modelo</title>
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
                        <h2>Editar Modelo</h2>
                        <h4>Edita el Modelo</h4>
                    </hgroup>
                </header>
                <form id="frmEditarModelo" method="POST" action="?controller=Modelo&action=EditarPOST">
                    <fieldset>
                        <legend>Editar Modelo</legend>
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
                            <legend>Información de Modelo</legend>
                            <table>
                                 <tr>
                                    <td><label for="txtIdModelo"><abbr title="Código identificador">ID.</abbr> Modelo</label></td>
                                    <td><input id="txtIdModelo" type="text" name="idModelo"></td>
                                </tr>
                                    <tr>
                                    <td><label for="txtDescripcion">Descripción</label></td>
                                    <td><input id="txtDescripcion" type="text" name="descripcion" placeholder="Escribe una descripción"></td>  
                                </tr>
                                <tr>
                                    <td><label for="txtIndicacion">Indicación</label></td>
                                    <td><textarea id="txtIndicacion" name="indicacion" placeholder="Escribe una indicación" ></textarea></td>  
                                </tr>
                            </table>
                        </fieldset>
                        <table>
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
                                    if(is_array($vwMarcas)) {
                                        foreach ($vwMarcas as $vwMarca) {
                                ?>
                                <tr>
                                    <td><?php echo $vwMarca->getIdMarca(); ?></td>
                                    <td><?php echo $vwMarca->getDescripcion(); ?></td>
                                    <td><?php echo $vwMarca->getNroModelos(); ?></td>
                                    <td><?php echo $vwMarca->getNroEquipos(); ?></td>
                                    <td><button class="btnSeleccionarMarca"></button></td>
                                </tr>
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <script type="text/javascript">
                        $('.btnSeleccionarMarca').button({
                            icons: {
                                primary: "ui-icon-check"
                            },
                            text: false
                        }).click(function() {
                            var idMarca = $(this).parents('tr').find('td').eq(0).text();
                            setValue($('#txtIdMarca'), idMarca);
                            //comprobarMarca();
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
                            $('#divMarca').dialog('close');
                        });
                    </script>
                </form>
            </article>
        </section>
    </body>
</html>