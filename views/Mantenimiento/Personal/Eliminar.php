<!-- File: /views/Mantenimiento/Personal/Eliminar.php -->

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
       
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript" src="resources/js/jquery.codaPopupBubbles.js"></script>
        <script type="text/javascript" src="resources/js/template.eliminar.js"></script>
        
        <title>SIRALL2 - Eliminar Personal</title>
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
                        <h2>Eliminar Personal</h2>
                        <h4>¿Está seguro de eliminar el Personal?</h4>
                    </hgroup>
                </header>
                <form id="frmEliminarPersonal" method="POST" action="?controller=Personal&action=EliminarPOST">
                     <fieldset>
                        <legend>Eliminar Personal</legend>
                        <input id="idPersonal" type="hidden" value="<?php echo $vwPersonal->getIdPersonal(); ?>" name="idPersonal"/>
                        <table>
                            <tr>
                                <td><strong><abbr title="Código identificador">ID.</abbr> Personal:</strong></td>
                                <td><?php echo $vwPersonal->getIdPersonal(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Nombre Completo:</strong></td>
                                <td><?php echo $vwPersonal->getNombreCompleto(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Correo:</strong></td>
                                <td><?php echo $vwPersonal->getCorreo(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>RPM:</strong></td>
                                <td><?php echo $vwPersonal->getRpm(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Anexo:</strong></td>
                                <td><?php echo $vwPersonal->getAnexo(); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="enviar" type="button" value="" name="enviar">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Personal">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <!-- Ventana de diálogo confirmar -->
                <div id="confirmar" title="Advertencia">
                    <p>¿Está seguro de eliminar el Personal?</p>
                </div>
            </article>
        </section>
    </body>
</html>