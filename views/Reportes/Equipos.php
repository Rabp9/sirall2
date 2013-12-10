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
                <!--
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
                -->
                <!--
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
                -->
            </article>
        </section>
    </body>
</html>