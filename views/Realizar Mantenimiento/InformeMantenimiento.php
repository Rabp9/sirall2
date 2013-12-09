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
                            <td><?php echo $equipo['Modelo']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Marca:</strong></td>
                            <td><?php echo $equipo['Marca']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Tipo de Equipo:</strong></td>
                            <td><?php echo $equipo['TipoEquipo']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Usuario:</strong></td>
                            <td><?php echo $equipo['Usuario']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Dependencia:</strong></td>
                            <td><?php echo $equipo['Dependencia']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Establecimiento:</strong></td>
                            <td><?php echo $equipo['Establecimiento']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Indicacion:</strong></td>
                            <td><?php echo $equipo['indicacion']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Fecha de último Mantenimiento:</strong></td>
                            <td><?php echo $equipo['fechaUltimo']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Número de matenimientos:</strong></td>
                            <td><?php echo $equipo['numeroMan']; ?></td>  
                        </tr>
                    </table>
                </fieldset>
                <fieldset>
                    <legend>Informe de Mantenimientoo</legend>
                    <form id="frmInformeMantenimiento" method="POST" action="?controller=MovimientoRepuesto&action=IngresoPOST">
                        <table>
                            <tr>
                                <td><label for="txtIdMantenimiento"><abbr title="Código identificador">ID.</abbr> Mantemiento</label></td>
                                <td><input id="txtIdMantenimiento" type="text" name="idMantenimiento"></td>
                            </tr>
                            <tr>
                                <td><label for="txtTecnico">Técnico</label></td>
                                <td><input id="txtTecnico" type="text" name="tecnico" placeholder="Nombre del técnico"></td>  
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
                        </table>
                    </form>
                </fieldset>
            </article>
        </section>
    </body>
</html>