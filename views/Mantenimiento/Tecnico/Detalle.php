<!-- File: /views/Mantenimiento/Tecnico/Detalle.php -->

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

        <title>SIRALL2 - Detalle Técnico</title>
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
                        <h2>Detalle Técnico</h2>
                        <h4>Detalla la información de un Técnico</h4>
                    </hgroup>
                </header>
                <fieldset>
                    <legend>Detalle Técnico</legend>
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
                            <td>
                                <a class="aEditar" href="?controller=Tecnico&action=Editar&idTecnico=<?php echo $tecnico->getIdTecnico(); ?>">Editar</a> |
                                <a class="aEliminar" href="?controller=Tecnico&action=Eliminar&idTecnico=<?php echo $tecnico->getIdTecnico(); ?>">Eliminar</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="?controller=Tecnico">Regresar</a></td>
                        </tr>
                    </table>
                </fieldset>
            </article>
        </section>
    </body>
</html>