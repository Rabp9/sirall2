<!-- File: /views/Mantenimiento/Tecnico/Lista.php -->

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
        
        <title>SIRALL2 - Lista Técnico</title>
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
                        <h2>Lista Técnico</h2>
                        <h4>Lista de Técnicos informáticos</h4>
                    </hgroup>
                </header>
                <?php if(isset($mensaje)) { ?>
                <div id="mensaje" title="Mensaje"><p><?php echo $mensaje; ?></p></div>
                <?php } ?>
                <table class="tblLista">
                    <thead>
                        <tr>
                            <th><abbr title="Código identificador">ID.</abbr> Técnico</th>
                            <th>Nombre Completo</th>
                            <th>RPM</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(is_array($tecnicos)) {
                                foreach ($tecnicos as $tecnico) {
                        ?>
                        <tr>
                            <td><?php echo $tecnico->getIdTecnico(); ?></td>
                            <td><?php echo $tecnico->getNombreCompleto(); ?></td>
                            <td><?php echo $tecnico->getRpm(); ?></td>
                            <td>
                                <button class="select">Acciones</button>
                                <ul>
                                    <li><a href="?controller=Tecnico&action=Detalle&idTecnico=<?php echo $tecnico->getIdTecnico(); ?>">Detalle</a></li>
                                    <li><a href="?controller=Tecnico&action=Editar&idTecnico=<?php echo $tecnico->getIdTecnico(); ?>">Editar</a></li>
                                    <li><a href="?controller=Tecnico&action=Eliminar&idTecnico=<?php echo $tecnico->getIdTecnico(); ?>">Eliminar</a></li>
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
                            <td colspan="2"><a class="crearLink" href="?controller=Tecnico&action=Crear">Crear Técnico</a></td>
                        </tr>
                    </tfoot>
                </table>
            </article>
        </section>
    </body>
</html>