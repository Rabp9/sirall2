<!-- File: /views/Mantenimiento/Tecnico/Eliminar.php -->

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
        
        <title>SIRALL2 - Eliminar Técnico</title>
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
                        <h2>Eliminar Técnico</h2>
                        <h4>¿Está seguro de eliminar el Técnico?</h4>
                    </hgroup>
                </header>
                <form id="frmEliminarTecnico" method="POST" action="?controller=Tecnico&action=EliminarPOST">
                     <fieldset>
                        <legend>Eliminar Técnico</legend>
                        <input id="idTecnico" type="hidden" value="<?php echo $tecnico->getIdTecnico(); ?>" name="idTecnico"/>
                        <table>
                            <tr>
                                <td><strong><abbr title="Código identificador">ID.</abbr> Técnico:</strong></td>
                                <td><?php echo $tecnico->getIdTecnico(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Nombre completo:</strong></td>
                                <td><?php echo $tecnico->getNombreCompleto(); ?></td>  
                            </tr>
                            <tr>
                                <td><strong>RPM:</strong></td>
                                <td><?php echo $tecnico->getRpm(); ?></td>  
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="enviar" type="button" value="" name="enviar">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Establecimiento">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <!-- Ventana de diálogo confirmar -->
                <div id="confirmar" title="Advertencia">
                    <p>¿Está seguro de eliminar el Técnico?</p>
                </div>
            </article>
        </section>
    </body>
</html>