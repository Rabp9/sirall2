<!-- File: /views/Mantenimiento/Modelo/Lista.php -->

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
        
        <title>SIRALL2 - Lista Modelo</title>
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
                        <h2>Lista Modelo</h2>
                        <h4>Lista de Modelos registrados</h4>
                    </hgroup>
                </header>       
                <?php if(isset($mensaje)) { ?>
                <div id="mensaje" title="Mensaje"><p><?php echo $mensaje; ?></p></div>
                <?php } ?>
                <table class="tblLista">
                    <thead>
                        <tr>
                            <th><abbr title="Código identificador">ID.</abbr> Modelo</th>
                            <th>Tipo de Equipo</th>
                            <th>Marca</th>
                            <th>Descripción</th>
                            <th>Indicación</th>
                            <th>N° Equipos</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(is_array($vwModelos)) {
                                foreach ($vwModelos as $vwModelo) {
                        ?>
                        <tr>
                            <td><?php echo $vwModelo->getIdModelo(); ?></td>
                            <td><?php echo $vwModelo->getTipoEquipo(); ?></td>
                            <td><?php echo $vwModelo->getMarca(); ?></td>
                            <td><?php echo $vwModelo->getDescripcion(); ?></td>
                            <td><?php echo $vwModelo->getIndicacion(); ?></td>
                            <td><?php echo $vwModelo->getNroEquipos(); ?></td>
                            <td>
                                <button class="select">Acciones</button>
                                <ul>
                                    <li><a href="?controller=Modelo&action=Detalle&idModelo=<?php echo $vwModelo->getIdModelo(); ?>">Detalle</a></li>
                                    <li><a href="?controller=Modelo&action=Editar&idModelo=<?php echo $vwModelo->getIdModelo(); ?>">Editar</a></li>
                                    <li><a href="?controller=Modelo&action=Eliminar&idModelo=<?php echo $vwModelo->getIdModelo(); ?>">Eliminar</a></li>
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
                            <td colspan="2"><a class="crearLink" href="?controller=Modelo&action=Crear">Crear Modelo</a></td>
                        </tr>
                    </tfoot>
                </table>
            </article>
        </section>
    </body>
</html>