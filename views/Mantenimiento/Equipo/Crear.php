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
                                <td><label for="btnDependenciaSuperior">Dependencia Superior</label></td>
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