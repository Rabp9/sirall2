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
        <script type="text/javascript" src="resources/js/template.datepicker-es.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                setValue($('#txtFechaFin'), '<?php echo date('d/m/Y'); ?>');
                $("#txtFechaInicio").datepicker(
                { 
                    changeYear: true,
                    changeMonth: true
                });
                $("#txtFechaFin").datepicker(
                { 
                    changeYear: true,
                    changeMonth: true
                });
                setValue($("#txtIdMantenimiento"), "<?php echo $mantenimiento->getIdMantenimiento(); ?>");
                <?php 
                    $fecha = new DateTime();
                    $fecha->createFromFormat('Y-m-d', $mantenimiento->getFechaInicio());
                ?>
                setValue($("#txtFechaInicio"), "<?php echo $fecha->format("d/m/Y"); ?>");
            });
        </script> 
        
        <title>SIRALL2 - Informe de Mantenimiento de Equipo</title>
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
                        <h2>Informe de Mantenimiento de Equipo</h2>
                        <h4>Registra el informe de Mantenimiento de Equipo</h4>
                    </hgroup>
                </header>
                <fieldset>
                    <legend>Información de Equipo</legend>
                    <table>
                        <tr>
                            <td><strong>Código Patrimonial:</strong></td>
                            <td><?php echo $equipo['codigoPatrimonial']?></td>
                        </tr>
                        <tr>
                            <td><strong>Serie:</strong></td>
                            <td><?php echo $equipo['serie']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Modelo:</strong></td>
                            <td><?php echo $equipo['modelo']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Marca:</strong></td>
                            <td><?php echo $equipo['marca']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Tipo de Equipo:</strong></td>
                            <td><?php echo $equipo['tipoEquipo']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Usuario:</strong></td>
                            <td><?php echo $equipo['usuario']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Dependencia:</strong></td>
                            <td><?php echo $equipo['dependencia']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Establecimiento:</strong></td>
                            <td><?php echo $equipo['establecimiento']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Indicacion:</strong></td>
                            <td><?php echo $equipo['indicacion']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Fecha de último Mantenimiento:</strong></td>
                            <td><?php if($equipo['fechaUltimo'] != "0000-00-00") echo $equipo['fechaUltimo']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Número de matenimientos:</strong></td>
                            <td><?php echo $equipo['numeroMan']; ?></td>  
                        </tr>
                    </table>
                </fieldset>
                <fieldset>
                    <legend>Informe de Mantenimientoo</legend>
                    <form id="frmInformeMantenimiento" method="POST" action="?controller=RealizarMantenimiento&action=RegistrarMantenimientoPOST">
                        <table>
                            <tr>
                                <td><label for="txtIdMantenimiento"><abbr title="Código identificador">ID.</abbr> Mantemiento</label></td>
                                <td><input id="txtIdMantenimiento" type="text" name="idMantenimiento"></td>
                            </tr>
                            <tr>
                                <td><label for="sltIdTecnico">Técnico</label></td>
                                <td>
                                    <select id="sltIdTecnico" name="idTecnico" required="true">
                                        <option disabled selected value="">Selecciona un Técnico</option>
                                        <?php
                                            if(is_array($tecnicos)) {
                                                foreach ($tecnicos as $tecnico) {
                                                    echo "<option value='" . $tecnico->getIdTecnico() . "'>" . $tecnico->getNombreCompleto() . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>     
                            </tr>
                            <tr>
                                <td><label for="textareaDiagnostico">Diagnóstico</label></td>
                                <td><textarea id="textareaDiagnostico" name="diagnostico" placeholder="Escriba un diagnóstico" class="textareaLargo" maxlength="500"></textarea></td>  
                            </tr>
                            <tr>
                                <td><label for="textareaInforme">Informe</label></td>
                                <td><textarea id="textareaInforme" name="informe" placeholder="Escriba un informe" class="textareaLargo" maxlength="500"></textarea></td>
                            </tr>
                            <tr>
                                <td><label for="txtFechaInicio">Fecha Inicio</label></td>
                                <td><input id="txtFechaInicio" type="text" name="fechaInicio"></td>
                            </tr>
                            <tr>
                                <td><label for="txtFechaFin">Fecha Fin</label></td>
                                <td><input id="txtFechaFin" type="text" name="fechaFin"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </fieldset>
            </article>
        </section>
    </body>
</html>