<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.js"></script>
        <script type="text/javascript" src="resources/js/funciones.js"></script>
        <script type="text/javascript" src="resources/js/jquery.codaPopupBubbles.js"></script>
       
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
            
        <title>SIRALL2 - Detalle Tipo de Equipo</title>
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
                        <h2>Detalle Tipo de Equipo</h2>
                        <h4>Detalla la información del Tipo de Equipo</h4>
                    </hgroup>
                </header>
                <fieldset>
                    <legend>Detalle Tipo de Equipo</legend>
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
                            <td>
                                <a href="?controller=TipoEquipo&action=Editar&idTipoEquipo=<?php echo $tipoEquipo->getIdTipoEquipo(); ?>">Editar</a> |
                                <a href="?controller=TipoEquipo&action=Eliminar&idTipoEquipo=<?php echo $tipoEquipo->getIdTipoEquipo(); ?>">Eliminar</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="?controller=TipoEquipo">Regresar</a></td>
                        </tr>
                    </table>
                </fieldset>
            </article>
        </section>
    </body>
</html>