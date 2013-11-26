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
        
        <title>SIRALL2 - Lista Marca</title>
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
                        <h2>Lista Marca</h2>
                        <h4>Lista de Marcas registradas</h4>
                    </hgroup>
                </header>       
                <?php if(isset($mensaje)) { ?>
                <div id="mensaje" title="Mensaje"><p><?php echo $mensaje; ?></p></div>
                <?php } ?>
                <table class="tblLista">
                    <thead>
                        <tr>
                            <th><abbr title="Código identificador">ID.</abbr> Marca</th>
                            <th>Descripción</th>
                            <th>Indicación</th>
                            <th>N° Modelos</th>
                            <th>N° Equipos</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(is_array($vwMarcas)) {
                                foreach ($vwMarcas as $vwMarca) {
                        ?>
                        <tr>
                            <td><?php echo $vwMarca->getIdMarca(); ?></td>
                            <td><?php echo $vwMarca->getDescripcion(); ?></td>
                            <td><?php echo $vwMarca->getIndicacion(); ?></td>
                            <td><?php echo $vwMarca->getNroModelos(); ?></td>
                            <td><?php echo $vwMarca->getNroEquipos(); ?></td>
                            <td>
                                <button class="select">Acciones</button>
                                <ul>
                                    <li><a href="?controller=Marca&action=Detalle&idMarca=<?php echo $vwMarca->getIdMarca(); ?>">Detalle</a></li>
                                    <li><a href="?controller=Marca&action=Editar&idMarca=<?php echo $vwMarca->getIdMarca(); ?>">Editar</a></li>
                                    <li><a href="?controller=Marca&action=Eliminar&idMarca=<?php echo $vwMarca->getIdMarca(); ?>">Eliminar</a></li>
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
                            <td colspan="2"><a class="crearLink" href="?controller=Marca&action=Crear">Crear Marca</a></td>
                        </tr>
                    </tfoot>
                </table>
            </article>
        </section>
    </body>
</html>