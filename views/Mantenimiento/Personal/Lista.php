<!-- File: /views/Mantenimiento/Personal/lista.php -->

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/jquery.dataTables_themeroller.css"/>
       
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript" src="resources/js/template.lista.js"></script>
        
        <title>SIRALL2 - Lista Personal</title>
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
                        <h2>Lista Personal</h2>
                        <h4>Lista de Personals registrados</h4>
                    </hgroup>
                </header>       
                <?php if(isset($mensaje)) { ?>
                <div id="mensaje" title="Mensaje"><p><?php echo $mensaje; ?></p></div>
                <?php } ?>
                <table class="tblLista">
                    <thead>
                        <tr>
                            <th><abbr title="Código identificador">ID.</abbr> Personal</th>
                            <th>Nombre Completo</th>
                            <th>Correo</th>
                            <th>RPM</th>
                            <th>Anexo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(is_array($vwPersonales)) {
                                foreach ($vwPersonales as $vwPersonal) {
                        ?>
                        <tr>
                            <td><?php echo $vwPersonal->getIdPersonal(); ?></td>
                            <td><?php echo $vwPersonal->getNombreCompleto(); ?></td>
                            <td><?php echo $vwPersonal->getCorreo(); ?></td>
                            <td><?php echo $vwPersonal->getRpm(); ?></td>
                            <td><?php echo $vwPersonal->getAnexo(); ?></td>
                            <td>
                                <button class="select">Acciones</button>
                                <ul>
                                    <li><a href="?controller=Personal&action=Detalle&idPersonal=<?php echo $vwPersonal->getIdPersonal(); ?>">Detalle</a></li>
                                    <li><a href="?controller=Personal&action=Editar&idPersonal=<?php echo $vwPersonal->getIdPersonal(); ?>">Editar</a></li>
                                    <li><a href="?controller=Personal&action=Eliminar&idPersonal=<?php echo $vwPersonal->getIdPersonal(); ?>">Eliminar</a></li>
                                </ul>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                    <tfoot>          
                        <tr>
                            <td colspan="2"><a class="crearLink" href="?controller=Personal&action=Crear">Crear Personal</a></td>
                        </tr>
                    </tfoot>
                </table>
            </article>
        </section>
    </body>
</html>