<!-- File: /views/Mantenimiento/Dependencia/Lista.php -->

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
        
        <title>SIRALL2 - Lista Dependencia</title>
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
                        <h2>Lista Dependencia</h2>
                        <h4>Lista de Dependencias registradas</h4>
                    </hgroup>
                </header>  
                <?php if(isset($mensaje)) { ?>
                <div id="mensaje" title="Mensaje"><p><?php echo $mensaje; ?></p></div>
                <?php } ?>
                <table class="tblLista">
                    <thead>
                        <tr>
                            <th><abbr title="Código identificador">ID.</abbr> Dependencia</th>
                            <th>Descripción</th>
                            <th>Establecimiento</th>
                            <th>Dependencia Superior</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(is_array($vwDependencias)) {
                                foreach ($vwDependencias as $vwDependencia) {
                        ?>
                        <tr>
                            <td><?php echo $vwDependencia->getIdDependencia(); ?></td>
                            <td><?php echo $vwDependencia->getDescripcion(); ?></td>
                            <td><?php echo $vwDependencia->getEstablecimiento(); ?></td>
                            <td><?php echo $vwDependencia->getSuperDependencia(); ?></td>
                            <td>
                                <button class="select">Acciones</button>
                                <ul>
                                    <li><a href="?controller=Dependencia&action=Detalle&idDependencia=<?php echo $vwDependencia->getIdDependencia(); ?>"><img src="resources/images/detalle.png"> Detalle</a></li>
                                    <li><a href="?controller=Dependencia&action=Editar&idDependencia=<?php echo $vwDependencia->getIdDependencia(); ?>"><img src="resources/images/editar.png"> Editar</a></li>
                                    <li><a href="?controller=Dependencia&action=Eliminar&idDependencia=<?php echo $vwDependencia->getIdDependencia(); ?>"><img src="resources/images/eliminar.png"> Eliminar</a></li>
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
                            <td colspan="2"><a class="crearLink" href="?controller=Dependencia&action=Crear">Crear Dependencia</a></td>
                        </tr>
                    </tfoot>
                </table>
            </article>
        </section>
    </body>
</html>