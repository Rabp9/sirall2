<!-- File: /views/Mantenimiento/Area/Lista.php -->

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
        
        <title>SIRALL2 - Lista Area</title>
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
                        <h2>Lista Area</h2>
                        <h4>Lista de Áreas registradas</h4>
                    </hgroup>
                </header>  
                <?php if(isset($mensaje)) { ?>
                <div id="mensaje" title="Mensaje"><p><?php echo $mensaje; ?></p></div>
                <?php } ?>
                <table class="tblLista">
                    <thead>
                        <tr>
                            <th><abbr title="Código identificador">ID.</abbr> Area</th>
                            <th>Descripción</th>
                            <th>Establecimiento</th>
                            <th>Jefatura Inmediata</th>
                            <th>Área General</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(is_array($vwAreas)) {
                                foreach ($vwAreas as $vwArea) {
                        ?>
                        <tr>
                            <td><?php echo $vwArea->getIdArea(); ?></td>
                            <td><?php echo $vwArea->getDescripcion(); ?></td>
                            <td><?php echo $vwArea->getEstablecimiento(); ?></td> 
                            <td><?php echo $vwArea->getJefaturaInmediata(); ?></td>
                            <td><?php echo $vwArea->getAreaGeneral(); ?></td>
                            <td>
                                <button class="select">Acciones</button>
                                <ul>
                                    <li><a href="?controller=Area&action=Detalle&idArea=<?php echo $vwArea->getIdArea(); ?>">Detalle</a></li>
                                    <li><a href="?controller=Area&action=Editar&idArea=<?php echo $vwArea->getIdArea(); ?>">Editar</a></li>
                                    <li><a href="?controller=Area&action=Eliminar&idArea=<?php echo $vwArea->getIdArea(); ?>">Eliminar</a></li>
                                    <li><a href="?controller=Area&action=AsignarPersonal&idArea=<?php echo $vwArea->getIdArea(); ?>"><span class="ui-icon ui-icon-arrowreturnthick-1-e"> </span>Asg. Per.</a></li>
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
                            <td colspan="2"><a class="crearLink" href="?controller=Area&action=Crear">Crear Área</a></td>
                        </tr>
                    </tfoot>
                </table>
            </article>
        </section>
    </body>
</html>