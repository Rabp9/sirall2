<!-- File: /views/Mantenimiento/Establecimiento/Crear.php -->

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
                isRequired($('#txtDireccion'));
                setValue($('#txtIdEstablecimiento'), '<?php echo $nextID; ?>');
                isReadOnly($('#txtIdEstablecimiento'));
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $('#txtDescripcion').focus();
            });
        </script>
        
        <title>SIRALL2 - Crear Establecimiento</title>
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
                        <h2>Crear Establecimiento</h2>
                        <h4>Crea un Establecimiento</h4>
                    </hgroup>
                </header>
                <form id="frmCrearEstablecimiento" method="POST" action="?controller=Establecimiento&action=CrearPOST">
                    <fieldset>
                        <legend>Crear Establecimiento</legend>
                        <table>
                            <tr>
                                <td><label for="txtIdEstablecimiento"><abbr title="Código identificador">ID.</abbr> Establecimiento</label></td>
                                <td><input id="txtIdEstablecimiento" type="text" name="idEstablecimiento"></td>
                            </tr>
                            <tr>
                                <td><label for="txtDescripcion">Descripcion</label></td>
                                <td><input id="txtDescripcion" type="text" name="descripcion" placeholder="Escribe una descripción"></td>  
                            </tr>
                            <tr>
                                <td><label for="txtDirección">Dirección</label></td>
                                <td><textarea id="txtDireccion" name="direccion" placeholder="Escribe una dirección"></textarea></td>  
                            </tr>
                            <tr>
                                <td><label for="sltNivel">Nivel</label></td>
                                <td>
                                    <select id="sltNivel" name="nivel">
                                        <option disabled selected value="">Selecciona un Nivel</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="GER">GER</option>
                                    </select>
                                </td>  
                            </tr>
                            <tr>
                                <td><label for="sltTipoCAS">Tipo de CAS</label></td>
                                <td>
                                    <select id="sltTipoCAS" name="tipoCAS">
                                        <option disabled selected value="">Selecciona un Tipo de CAS</option>
                                        <option value="PM">PM</option>
                                        <option value="CM">CM</option>
                                        <option value="POL">POL</option>
                                        <option value="CME">CME</option>
                                        <option value="CAP I">CAP I</option>
                                        <option value="CAP II">CAP II</option>
                                        <option value="CAP III">CAP III</option>
                                        <option value="H I">H I</option>
                                        <option value="H II">H II</option>
                                        <option value="H III">H III</option>
                                        <option value="H IV">H IV</option>
                                        <option value="GER">GER</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="sltSituacion">Situación</label></td>
                                <td>
                                    <select id="sltSituacion" name="situacion">
                                        <option disabled selected value="">Selecciona una Situación</option>
                                        <option value="PROPIO">PROPIO</option>
                                        <option value="ALQUILADO">ALQUILADO</option>
                                        <option value="CESION EN USO">CESIÓN EN USO</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="txtTelefono">Teléfono</label></td>
                                <td><input id="txtTelefono" type="text" name="telefono" placeholder="Escribe un teléfono"/></td>  
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Establecimiento">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>