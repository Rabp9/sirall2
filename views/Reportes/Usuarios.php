<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
       
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
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
        
        <title>SIRALL2 - Reporte de Usuarios</title>
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
                        <h2>Reporte de Usuarios</h2>
                        <h4>Reportar la lista de Usuarios</h4>
                    </hgroup>
                </header>
                <form id="frmReporteUsuarios" method="POST" action="?controller=Reporte&action=ReporteUsuariosPOST">
                    <fieldset>
                        <legend>Opciones de Reporte</legend>
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
            </article>
        </section>
    </body>
</html>