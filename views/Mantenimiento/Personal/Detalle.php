<!-- File: /views/Mantenimiento/Personal/Detalle.php -->

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

        <title>SIRALL2 - Detalle Personal</title>
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
                        <h2>Detalle Personal</h2>
                        <h4>Detalla la información del Personal</h4>
                    </hgroup>
                </header>
                <fieldset>
                    <legend>Detalle Personal</legend>
                    <table>
                        <tr>
                            <td><strong><abbr title="Código identificador">ID.</abbr> Personal:</strong></td>
                            <td><?php echo $vwPersonal->getIdPersonal(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Área:</strong></td>
                            <td><?php echo $vwPersonal->getArea(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Área General:</strong></td>
                            <td><?php echo $vwPersonal->getAreaGeneral(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Establecimiento:</strong></td>
                            <td><?php echo $vwPersonal->getEstablecimiento(); ?></td>  
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
                            <td>
                                <a class="aEditar" href="?controller=Personal&action=Editar&idPersonal=<?php echo $vwPersonal->getIdPersonal(); ?>">Editar</a> |
                                <a class="aEliminar" href="?controller=Personal&action=Eliminar&idPersonal=<?php echo $vwPersonal->getIdPersonal(); ?>">Eliminar</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="?controller=Personal">Regresar</a></td>
                        </tr>
                    </table>
                </fieldset>
            </article>
        </section>
    </body>
</html>