<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
       
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript" src="resources/js/template.eliminar.js"></script>
        
        <title>SIRALL2 - Eliminar Tipo de Equipo</title>
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
                        <h2>Eliminar Tipo de Equipo</h2>
                        <h4>¿Está seguro de eliminar el Tipo de Equipo?</h4>
                    </hgroup>
                </header>
                <form id="frmEliminarTipoEquipo" method="POST" action="?controller=TipoEquipo&action=EliminarPOST">
                     <fieldset>
                        <legend>Eliminar Tipo de Equipo</legend>
                        <input id="idTipoEquipo" type="hidden" value="<?php echo $tipoEquipo->getIdTipoEquipo(); ?>" name="idTipoEquipo"/>
                        <table>
                            <tr>
                                <td><strong><abbr title="Código identificador">ID.</abbr> Tipo de Equipo:</strong></td>
                                <td><?php echo $tipoEquipo->getIdTipoEquipo(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Descripción:</strong></td>
                                <td><?php echo $tipoEquipo->getDescripcion(); ?></td>  
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="enviar" type="button" value="" name="enviar">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=TipoEquipo">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <!-- Ventana de diálogo confirmar -->
                <div id="confirmar" title="Advertencia">
                    <p>¿Está seguro de eliminar el Tipo de Equipo?</p>
                </div>
            </article>
        </section>
    </body>
</html>