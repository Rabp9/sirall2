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
        
        <title>SIRALL2 - Eliminar Repuesto</title>
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
                        <h2>Eliminar Repuesto</h2>
                        <h4>¿Está seguro de eliminar el Repuesto?</h4>
                    </hgroup>
                </header>
                <form id="frmEliminarRepuesto" method="POST" action="?controller=Repuesto&action=EliminarPOST">
                     <fieldset>
                        <legend>Eliminar Repuesto</legend>
                        <input id="idRepuesto" type="hidden" value="<?php echo $repuesto->getIdRepuesto(); ?>" name="idRepuesto"/>
                        <table>
                            <tr>
                                <td><strong><abbr title="Código identificador">ID.</abbr> Repuesto:</strong></td>
                                <td><?php echo $repuesto->getIdRepuesto(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Descripción:</strong></td>
                                <td><?php echo $repuesto->getDescripcion(); ?></td>  
                            </tr>
                            <tr>
                                <td><strong>Unidad de Medida:</strong></td>
                                <td><?php echo $repuesto->getUnidadMedida(); ?></td>  
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="enviar" type="button" value="" name="enviar">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Repuesto">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <!-- Ventana de diálogo confirmar -->
                <div id="confirmar" title="Advertencia">
                    <p>¿Está seguro de eliminar el Repuesto?</p>
                </div>
            </article>
        </section>
    </body>
</html>