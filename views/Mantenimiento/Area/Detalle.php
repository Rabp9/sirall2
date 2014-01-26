<!-- File: /views/Mantenimiento/Area/Detalle.php -->

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

        <title>SIRALL2 - Detalle Área</title>
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
                        <h2>Detalle Área</h2>
                        <h4>Detalla la información de la Área</h4>
                    </hgroup>
                </header>
                <fieldset>
                    <legend>Detalle Área</legend>
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
                            <td>
                                <a class="aEditar" href="?controller=Area&action=Editar&idArea=<?php echo $vwArea->getIdArea(); ?>">Editar</a> |
                                <a class="aEliminar" href="?controller=Area&action=Eliminar&idArea=<?php echo $vwArea->getIdArea(); ?>">Eliminar</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="?controller=Area">Regresar</a></td>
                        </tr>
                    </table>
                </fieldset>
            </article>
        </section>
    </body>
</html>