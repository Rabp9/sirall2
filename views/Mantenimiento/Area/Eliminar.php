<!-- File: /views/Mantenimiento/Area/Eliminar.php -->

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
        <script type="text/javascript" src="resources/js/jquery.codaPopupBubbles.js"></script>
        
        <title>SIRALL2 - Eliminar Área</title>
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
                        <h2>Eliminar Área</h2>
                        <h4>¿Está seguro de eliminar el Área?</h4>
                    </hgroup>
                </header>
                <form id="frmEliminarArea" method="POST" action="?controller=Area&action=EliminarPOST">
                     <fieldset>
                        <legend>Eliminar Area</legend>
                        <input id="idArea" type="hidden" value="<?php echo $vwArea->getIdArea(); ?>" name="idArea"/>
                        <table>
                            <tr>
                                <td><strong><abbr title="Código identificador">ID.</abbr> Área:</strong></td>
                                <td><?php echo $vwArea->getIdArea(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Descripción:</strong></td>
                                <td><?php echo $vwArea->getDescripcion(); ?></td>  
                            </tr>
                            <tr>
                                <td><strong>Establecimiento:</strong></td>
                                <td><?php echo $vwArea->getEstablecimiento(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Jefatura Inmediata:</strong></td>
                                <td><?php echo $vwArea->getJefaturaInmediata(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Área General:</strong></td>
                                <td><?php echo $vwArea->getAreaGeneral(); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="enviar" type="button" value="" name="enviar">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Area">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <!-- Ventana de diálogo confirmar -->
                <div id="confirmar" title="Advertencia">
                    <p>¿Está seguro de eliminar el Área?</p>
                </div>
            </article>
        </section>
    </body>
</html>