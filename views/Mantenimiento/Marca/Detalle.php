<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
      
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.js"></script>
        <script type="text/javascript" src="resources/js/jquery.codaPopupBubbles.js"></script>
            
        <title>SIRALL2 - Detalle Marca</title>
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
                        <h2>Detalle Marca</h2>
                        <h4>Detalla la información de la Marca</h4>
                    </hgroup>
                </header>
                <fieldset>
                    <legend>Detalle Marca</legend>
                    <table>
                        <tr>
                            <td><strong><abbr title="Código identificador">ID.</abbr> Marca:</strong></td>
                            <td><?php echo $marca->getIdMarca(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Descripción:</strong></td>
                            <td><?php echo $marca->getDescripcion(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Indicación:</strong></td>
                            <td><?php echo $marca->getIndicacion(); ?></td>  
                        </tr>
                        <tr>
                            <td>
                                <a href="?controller=Marca&action=Editar&idMarca=<?php echo $marca->getIdMarca(); ?>">Editar</a> |
                                <a href="?controller=Marca&action=Eliminar&idMarca=<?php echo $marca->getIdMarca(); ?>">Eliminar</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="?controller=Marca">Regresar</a></td>
                        </tr>
                    </table>
                </fieldset>
            </article>
        </section>
    </body>
</html>