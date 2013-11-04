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
        <script type="text/javascript" src="resources/js/template.datepicker-es.js"></script>
        <script type="text/javascript" src="resources/js/template.dependenciaSelect.js"></script>
        <script type="text/javascript" src="resources/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="resources/js/jquery.treeview.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                isRequired($('#txtFecha'));
                setValue($('#txtFecha'), '<?php echo date('d/m/Y'); ?>');
                $('#buttonFlecha').button();
                $("#txtFecha").datepicker(
                { 
                    changeYear: true,
                    changeMonth: true
                });
                $('#buttonFlecha').css('height', '150px');
                $('#buttonFlecha').css('width', '150px');
                
                // INICIO Editar Seleccionar Dependencia
                var idDependencia = '<?php echo $usuario->getIdDependencia(); ?>';
                $("#ulDependencia li button").not($("button[title='Red']")).find("input[value='" + idDependencia + "']").parent().parent().find('button:eq(0)').addClass('selected');
                var $dependenciaSeleccionada = $("#ulDependencia li button.selected"); 
                var $redSeleccionada = $dependenciaSeleccionada.parents().filter($('li')).find($("button[title='Red']"));
                $('#txtDependenciaSeleccionada').html($dependenciaSeleccionada.text() + " (" + $redSeleccionada.text() + ")");   
                $('#hdnDependencia').val('<?php echo $usuario->getIdDependencia(); ?>');
                // FIN Editar Seleccionar Dependencia
                // 
                // 
                // INICIO Seleccionar Dependencia
                var btnSeleccionar = function() {
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
                                // Sólo para editar
                                setValue($("#cboUsuario"), '<?php echo $equipo->getIdUsuario(); ?>');
                            }
                        })
                    }
                };
                btnSeleccionar();
                $('#btnSeleccionar').click(btnSeleccionar);
                // FIN Seleccionar Dependencia
                //
                //
                // INICIO SELECCIONAR DEPENDENCIA 2
                // 
                // 
                // 
                $('#btnDependenciaSuperior2').button();
                $('#btnSeleccionar2').button();
                $('#dependenciaSelect2').dialog({
                    autoOpen: false,
                    modal: true,
                    width: 600,
                    show: {
                        effect: "blind",
                        duration: 1000
                    },
                    hide: {
                        effect: "explode",
                        duration: 1000
                    }
                });
                $('#btnDependenciaSuperior2').click(function() {
                    $('#dependenciaSelect2').dialog('open');
                });

                $("#ulDependencia2").treeview({
                    animated: "fast",
                    collapsed: false,
                    unique: false,
                    persist: "cookie"
                });
                $('#ulDependencia2 li button').css({'border-style': 'none', 'background-color': '#fff' });
                $('#ulDependencia2 li button').hover(function() {
                    $("#ulDependencia2 li button").removeClass('hover');
                    $(this).addClass('hover');
                }); 

                $("#ulDependencia2 li button").click(function() {
                    $("#ulDependencia2 li button").removeClass('selected');
                    $(this).addClass('selected');
                });

                $('#btnSeleccionar2').click(function() {
                    var $dependenciaSeleccionada = $("#ulDependencia2 li button.selected");
                    if($($dependenciaSeleccionada).length) {
                        var $redSeleccionada = $dependenciaSeleccionada.parents().filter($('li')).find($("button[title='Red']"));
                        $('#txtDependenciaSeleccionada2').html($dependenciaSeleccionada.text() + " (" + $redSeleccionada.text() + ")");
                        var tipo = $dependenciaSeleccionada.attr('title');
                        $('#hdnRed2').attr('value', $redSeleccionada.find('input').val());
                        if(tipo === 'Dependencia')
                            $('#hdnDependencia2').attr('value', $dependenciaSeleccionada.find('input').val());
                        else
                            $('#hdnDependencia2').attr('value', null);
                        $('#dependenciaSelect2').dialog('close');
                    }
                    else
                        alert('Selecciona una dependencia');
                });
                $('#btnSeleccionar2').click(function() {
                    var $dependenciaSeleccionada = $("#ulDependencia2 li button.selected");
                    if($($dependenciaSeleccionada).length) {
                        $.ajax({
                            url: 'Index.php',
                            type: 'GET',
                            data: {
                                controller: 'Usuario',
                                action: 'usuarioAJAX',
                                idDependencia: $('#hdnDependencia2').val()
                            },
                            success: function(data) {
                                $('#cboUsuario2').html("<option disabled selected value=''>Selecciona un Usuario</option>");
                                $(data).find('Usuario').each(function() {
                                    var option = new Option($(this).find('apellidoPaterno').text() + ' ' + $(this).find('apellidoMaterno').text() + ', ' + $(this).find('nombres').text(), $(this).find('idUsuario').text());
                                    $('#cboUsuario2').append(option);
                                });
                            }
                        })
                    }
                });
                // 
                // 
                // INICIO Validar Form
                $('form').submit(function() {
                    if(!$('#txtDependenciaSeleccionada').text().length) {
                        alert('Debes elegir una dependencia');
                        return false;
                    }
                    if(!$('#txtDependenciaSeleccionada2').text().length) {
                        alert('Debes elegir una dependencia');
                        return false;
                    }
                });
                // FIN Validar Form
            });
        </script>
        
        <title>SIRALL2 - Desplazamiento de Equipo</title>
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
                        <h2>Desplazamiento de Equipo</h2>
                        <h4>Registra el desplazamiento de los equipos</h4>
                    </hgroup>
                </header>
                <form id="frmDesplazamiento" method="POST" action="?controller=Desplazamiento&action=DesplazamientoPOST">
                    <fieldset>
                        <legend>Desplazamiento</legend>
                        <fieldset>
                            <legend>Detalle Equipo</legend>
                            <table>
                                <tr>
                                    <td><strong>Código Patrimonial:</strong></td>
                                    <td>
                                        <?php echo $equipo->getCodigoPatrimonial(); ?>
                                        <input type="hidden" value="<?php echo $equipo->getCodigoPatrimonial(); ?>" name="codigoPatrimonial" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Serie:</strong></td>
                                    <td><?php echo $equipo->getSerie(); ?></td>  
                                </tr>
                                <tr>
                                    <td><strong>Modelo:</strong></td>
                                    <td><?php echo $modelo->getDescripcion(); ?></td>  
                                </tr>
                                <tr class="ui-icon-arrow-1-e">
                                    <td><strong>Marca:</strong></td>
                                    <td><?php echo $marca->getDescripcion(); ?></td>  
                                </tr>
                                <tr>
                                    <td><strong>Tipo de Equipo:</strong></td>
                                    <td><?php echo $tipoEquipo->getDescripcion(); ?></td>  
                                </tr>
                                <tr>
                                    <td><strong>Usuario:</strong></td>
                                    <td><?php echo $usuario->getApellidoPaterno() . ' ' . $usuario->getApellidoMaterno() . ', ' . $usuario->getNombres(); ?></td>  
                                </tr>
                                <tr>
                                    <td><strong>Dependencia:</strong></td>
                                    <td><?php echo $dependencia->getDescripcion(); ?></td>  
                                </tr>
                                <tr>
                                    <td><strong>Red:</strong></td>
                                    <td><?php echo $red->getDescripcion(); ?></td>  
                                </tr>
                                <tr>
                                    <td><strong>Indicacion:</strong></td>
                                    <td><?php echo $equipo->getIndicacion(); ?></td>  
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Datos Desplazamiento</legend>
                            <table>
                                <tr>
                                    <td style="width: 400px;">
                                        <table>
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
                                    </td>
                                    <td><button id="buttonFlecha"><img src="resources/images/flecha-desplazamiento.png"/></button></td>
                                    <td style="width: 400px;">
                                        <table>
                                            <tr>
                                                <td><label for="btnDependenciaSuperior2">Dependencia</label></td>
                                                <td>
                                                    <button id="btnDependenciaSuperior2" type="button">Seleccionar</button>
                                                    <span id="txtDependenciaSeleccionada2"></span>
                                                    <input id="hdnRed2" type="hidden" name="idRed2" value=""/>
                                                    <input id="hdnDependencia2" type="hidden" name="idDependencia2" value=""/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="cboUsuario2">Usuario</label></td>
                                                <td>
                                                    <select id="cboUsuario2" name="idUsuario2">
                                                        <option disabled selected value="">Selecciona un Usuario</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td><label for="txtFecha">Fecha</label></td>
                                    <td><input id="txtFecha" type="text" name="fecha"></td>
                                </tr>
                                <tr>
                                    <td><label for="txt">Observación</label></td>
                                    <td><textarea id="txtFecha" name="observacion" placeholder="Ingrese una observación" class="textareaObservacion1"></textarea></td>
                                </tr>
                            </table>
                        </fieldset>
                    </fieldset>
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
                    
                    <div id="dependenciaSelect2" title="Seleccionar Dependencia">         
                        <p>Selecciona una Dependencia</p>
                        <?php
                            if(is_array($redes2)) {
                                echo "<ul id='ulDependencia2' class='treeview-blue'>";
                                foreach($redes2 as $red) {
                                    echo "<li><button type='button' title='Red'><input type='hidden' value='" . $red->getIdRed() ."'/>" . $red->getDescripcion() . "</button>";
                                    echo "<ul>";
                                    mostrarHijosRed($red, $dependencias2);
                                    echo "</ul>";
                                    echo "</li>";
                                }
                                echo "</ul>";
                            }
                        ?>
                        <button id="btnSeleccionar2" type="button">Seleccionar</button>
                    </div>
                </form>
            </article>
        </section>
    </body>
</html>