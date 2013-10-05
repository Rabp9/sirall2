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
                isRequired($('#txtCodigoPatrimonial'));
                isRequired($('#txtSerie'));
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $('#txtCodigoPatrimonial').focus();
                
                var cboModelo = function() {
                    $.ajax({
                        url: 'Index.php',
                        type: 'GET',
                        data: {
                            controller: 'Modelo',
                            action: 'modeloAJAX',
                            idMarca: $('#cboMarca').val(),
                            idTipoEquipo: $('#cboTipoEquipo').val()
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
                $('#cboMarca').change(cboModelo);                
                $('#cboTipoEquipo').change(cboModelo);          
                $('form').submit(function() {
                    if(!$('#txtDependenciaSeleccionada').text().length) {
                        alert('Debes elegir una dependencia');
                        return false;
                    }
                });
                
                
                $('#btnSeleccionar').click(function() {
                    var $dependenciaSeleccionada = $("#ulDependencia li a.selected");
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
            });
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
                                <td><label for="cboTipoEquipo">Tipo de Equipo</label></td>
                                <td>
                                    <select id="cboTipoEquipo" name="idTipoEquipo">
                                        <option disabled selected value="">Selecciona un Tipo de Equipo</option>
                                        <?php 
                                            if($tipoEquipos) { 
                                                foreach ($tipoEquipos as $tipoEquipo) {
                                                    echo "<option value='" . $tipoEquipo->getIdTipoEquipo() . "'>" . $tipoEquipo->getDescripcion() . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="cboMarca">Marca</label></td>
                                <td>
                                    <select id="cboMarca" name="idMarca">
                                        <option disabled selected value="">Selecciona una Marca</option>
                                        <?php 
                                            if($marcas) { 
                                                foreach ($marcas as $marca) {
                                                    echo "<option value='" . $marca->getIdMarca() . "'>" . $marca->getDescripcion() . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
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
                                        <?php 
                                            if($usuarios) { 
                                                foreach ($usuarios as $usuario) {
                                                    echo "<option value='" . $usuario->getIdUsuario() . "'>" . $usuario->getApellidoPaterno() . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="txtIndicacion">Indicación</label></td>
                                <td><textarea id="txtIndicacion" name="indicacion" placeholder="Escribe una indicación" ></textarea></td>  
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
                                
                                function mostrarHijosRed($padre, $dependencias) {
                                    if(is_array($dependencias)) {
                                        foreach ($dependencias as $dependencia) {
                                            if($padre->getIdRed() == $dependencia->getIdRed() && $dependencia->getSuperIdDependencia() == null) {
                                                echo "<li><a title='Dependencia'><input type='hidden' value='" . $dependencia->getIdDependencia() ."'/>" . $dependencia->getDescripcion() . "</a>";
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
                                            echo "<li><a title='Dependencia'><input type='hidden' value='" . $dependencia->getIdDependencia() ."'/>" . $dependencia->getDescripcion() . "</a>";
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
                                        echo "<li><a title='Red'><input type='hidden' value='" . $red->getIdRed() ."'/>" . $red->getDescripcion() . "</a>";
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
                </form>
            </article>
        </section>
    </body>
</html>