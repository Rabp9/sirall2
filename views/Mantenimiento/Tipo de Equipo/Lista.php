<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/jquery.dataTables_themeroller.css"/>
       
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript" src="resources/js/template.lista.js"></script>
        <script type="text/javascript" src="resources/js/jquery.dataTables.min.js"></script>
        <title>SIRALL2 - Lista Tipo de Equipo</title>
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
                        <h2>Lista Tipo de Equipo</h2>
                        <h4>Lista de Tipo de Equipos registrados</h4>
                    </hgroup>
                </header>       
                <?php if(isset($mensaje)) { ?>
                <div id="mensaje" title="Mensaje"><p><?php echo $mensaje; ?></p></div>
                <?php } ?>
                <table class="tblLista">
                    <thead>
                        <tr>
                            <th><abbr title="Código identificador">ID.</abbr> Equipo</th>
                            <th>Descripción</th>
                            <th>N° Modelos</th>
                            <th>N° Equipos</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($tipoEquipos)) {
                                while ($tipoEquipo = $tipoEquipos->fetch()) {
                        ?>
                        <tr>
                            <td><?php echo $tipoEquipo['idTipoEquipo']; ?></td>
                            <td><?php echo $tipoEquipo['descripcion']; ?></td>
                            <td><?php echo $tipoEquipo['Nro Modelos']; ?></td>
                            <td><?php echo $tipoEquipo['Nro Equipos']; ?></td>
                            <td>
                                <button class="select">Acciones</button>
                                <ul>
                                    <li><a href="?controller=TipoEquipo&action=Detalle&idTipoEquipo=<?php echo $tipoEquipo['idTipoEquipo']; ?>"><img src="resources/images/detalle.png"> Detalle</a></li>
                                    <li><a href="?controller=TipoEquipo&action=Editar&idTipoEquipo=<?php echo $tipoEquipo['idTipoEquipo']; ?>"><img src="resources/images/editar.png"> Editar</a></li>
                                    <li><a href="?controller=TipoEquipo&action=Eliminar&idTipoEquipo=<?php echo $tipoEquipo['idTipoEquipo']; ?>"><img src="resources/images/eliminar.png"> Eliminar</a></li>
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
                            <td colspan="2"><a class="crearLink" href="?controller=TipoEquipo&action=Crear">Crear Tipo de Equipo</a></td>
                        </tr>
                    </tfoot>
                </table>
            </article>
        </section>
    </body>
</html>