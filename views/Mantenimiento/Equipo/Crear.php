<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/jquery.treeview.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/jquery.dataTables_themeroller.css"/>
      
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript" src="resources/js/template.funciones.js"></script>
        <script type="text/javascript" src="resources/js/template.dependenciaSelect.js"></script>
        <script type="text/javascript" src="resources/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="resources/js/jquery.treeview.js"></script>
        <script type="text/javascript" src="resources/js/template.lista.js"></script>
        <script type="text/javascript" src="resources/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                isRequired($('#txtCodigoPatrimonial'));
                isRequired($('#txtSerie'));
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $('#txtIdTipoEquipo').focus();
                $('#asistente').tabs();
                var availableTags = [
                    "ActionScript",
                    "AppleScript",
                    "Asp",
                    "BASIC",
                    "C",
                    "C++",
                    "Clojure",
                    "COBOL",
                    "ColdFusion",
                    "Erlang",
                    "Fortran",
                    "Groovy",
                    "Haskell",
                    "Java",
                    "JavaScript",
                    "Lisp",
                    "Perl",
                    "PHP",
                    "Python",
                    "Ruby",
                    "Scala",
                    "Scheme"
                ];
                $( "#tags" ).autocomplete({
                    source: availableTags
                });
                // INICIO TABS
                $('div#asistente div:not(:first)').append("<button class='prev' type='button'>Anterior</button>");
                $('.prev').click(function() {
                    var selected = $("#asistente").tabs("option", "active");
                    $("#asistente").tabs("option", "active", selected - 1);
                });
                
                $('div#asistente div:not(:last)').append("<button class='next' type='button'>Siguiente</button>");
                $('.next').click(function() {
                    var selected = $("#asistente").tabs("option", "active");
                    $("#asistente").tabs("option", "active", selected + 1);
                });
                $('button.next').button();
                $('button.prev').button();
                // FIN TABS
                // 
                // 
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
                // INICIO Validar Form
                $('#frmCrearEquipo').submit(function() {
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
                
                $('form').submit(function() {
                    if(!$('#txtDependenciaSeleccionada').text().length) {
                        alert('Debes elegir una dependencia');
                        return false;
                    }
                });
                // FIN Validar Form
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
                // INICIO Seleccionar Dependencia
                $('#btnSeleccionar').click(function() {
                    var $dependenciaSeleccionada = $("#ulDependencia li button.selected");
                    if($($dependenciaSeleccionada).length) {
                        $.ajax({
                            url: 'Index.php',
                            type: 'GET',
                            data: {
                                controller: 'Usuario',
                                action: 'usuarioAJAX',
                                idDependencia: $('#hdnDependencia').val()
                            },
                            success: function(data) {
                                $('#cboUsuario').html("<option disabled selected value=''>Selecciona un Usuario</option>");
                                $(data).find('Usuario').each(function() {
                                    var option = new Option($(this).find('apellidoPaterno').text() + ' ' + $(this).find('apellidoMaterno').text() + ', ' + $(this).find('nombres').text(), $(this).find('idUsuario').text());
                                    $('#cboUsuario').append(option);
                                });
                            }
                        })
                    }
                });
                // FIN Seleccionar Dependencia
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
                $('#tblDetalle').styleTable(event);
                // FIN Estilizar Tabla
            });
            
            // INICIO presionar tecla
            function teclaPress(e) {
                var $this = $(e.target);
                var row_index = $this.parent().parent().index();
                var rows_count = $('#tblDetalle tbody tr').length;
                if(row_index === (rows_count - 1) && $this.val() !== '')
                    $('#tblDetalle tbody').append("<tr><td><input type='text' value='' onkeyup='teclaPress(event);' name='clave[]'></td><td><input type='text' value='' name='valor[]'></td></tr>");
                if(row_index === (rows_count - 2) && $this.val() === '')
                    $('#tblDetalle tbody tr:eq(' + (row_index - 1) + ')').remove();
            };
            // FIN presionar tecla
            
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
        </script>
        
        <title>SIRALL2 - Crear Equipo</title>
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
                        <h2>Crear Equipo</h2>
                        <h4>Crea un Equipo</h4>
                    </hgroup>
                </header>
                <form id="frmCrearEquipo" method="POST" action="?controller=Equipo&action=CrearPOST">
                    <fieldset>
                        <legend>Crear Equipo</legend>
                        <div id="asistente">
                            <ul>
                                <li><a href="#general">Información General</a></li>
                                <li><a href="#equipo">Información de Equipo</a></li>
                                <li><a href="#detalle">Información Detallada</a></li>
                            </ul>
                            <div id="general">
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
                                    <legend>General</legend>
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
                                            <td><label for="btnDependenciaSuperior">Dependencia</label></td>
                                            <td>
                                                <button id="btnDependenciaSuperior" type="button">Seleccionar</button>
                                                <span id="txtDependenciaSeleccionada"></span>
                                                <input id="hdnRed" type="hidden" name="idRed" value=""/>
                                                <input id="hdnDependencia" type="hidden" name="idDependencia" value=""/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="cboUsuario">Usuario</label></td>
                                            <td>
                                                <select id="cboUsuario" name="idUsuario">
                                                    <option disabled selected value="">Selecciona un Usuario</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </fieldset>
                            </div>
                            <div id="equipo">
                                <table>
                                    <tr>
                                        <td><label for="txtCodigoPatrimonial">Código Patrimonial</label></td>
                                        <td><input id="txtCodigoPatrimonial" type="text" name="codigoPatrimonial" placeholder="Escribe el código Patrimonial"></td>
                                    </tr>
                                <tr>
                                    <td><label for="txtSerie">Serie</label></td>
                                    <td><input id="txtSerie" type="text" name="serie" placeholder="Escribe la serie"></td>  
                                </tr>
                                <tr>
                                    <td><label for="txtIndicacion">Indicación</label></td>
                                    <td><textarea id="txtIndicacion" name="indicacion" placeholder="Escribe una indicación" ></textarea></td>  
                                </tr>
                            </table>
                            </div>
                            <div id="detalle">
                                <table id="tblDetalle">
                                    <thead>
                                        <tr>
                                            <th>Clave</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" value="" onkeyup="teclaPress(event);" name="clave[]"></td>
                                            <td><input type="text" value="" name="valor[]"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                                    if(is_array($dependencias)) {
                                        foreach ($dependencias as $dependencia) {
                                            if($padre->getIdRed() == $dependencia->getIdRed() && $dependencia->getSuperIdDependencia() == null) {
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
                                
                                if(is_array($redes)) {
                                    echo "<ul id='ulDependencia' class='treeview-blue'>";
                                    foreach($redes as $red) {
                                        echo "<li><button type='button' title='Red'><input type='hidden' value='" . $red->getIdRed() ."'/>" . $red->getDescripcion() . "</button>";
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
                        <table>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Equipo">Regresar</a></td>
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
                            cboModelo();
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
                            cboModelo();
                        });
                    </script>
                </form>
            </article>
        </section>
    </body>
</html>