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
        
        <title>SIRALL2 - Lista Equipo</title>
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
                        <h2>Lista Equipo</h2>
                        <h4>Lista de Equipos registrados</h4>
                    </hgroup>
                </header>       
                <?php if(isset($mensaje)) { ?>
                <div id="mensaje" title="Mensaje"><p><?php echo $mensaje; ?></p></div>
                <?php } ?>
                <table class="tblLista">
                    <thead>
                        <tr>
                            <th>Código Patrimonial</th>
                            <th>Serie</th>
                            <th>Tipo de Equipo</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Dependencia</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($equipos)) {
                                while ($equipo = $equipos->fetch()) {
                        ?>
                        <tr>
                            <td><?php echo $equipo['codigoPatrimonial']; ?></td>
                            <td><?php echo $equipo['serie']; ?></td>
                            <td><?php echo $equipo['TipoEquipo']; ?></td>
                            <td><?php echo $equipo['Marca']; ?></td>
                            <td><?php echo $equipo['Modelo']; ?></td>
                            <td><?php echo $equipo['Dependencia']; ?></td>
                            <td>
                                <button class="select">Acciones</button>
                                <ul>
                                    <li><a href="?controller=Equipo&action=Detalle&codigoPatrimonial=<?php echo $equipo['codigoPatrimonial']; ?>"><img src="resources/images/detalle.png"> Detalle</a></li>
                                    <li><a href="?controller=Equipo&action=Editar&codigoPatrimonial=<?php echo $equipo['codigoPatrimonial']; ?>">Editar</a></li>
                                    <li><a href="?controller=Equipo&action=Eliminar&codigoPatrimonial=<?php echo $equipo['codigoPatrimonial']; ?>"><img src="resources/images/eliminar.png"> Eliminar</a></li>
                                    <li><a href="?controller=Desplazamiento&action=DesplazamientoByEquipo&codigoPatrimonial=<?php echo $equipo['codigoPatrimonial']; ?>"><img src="resources/images/desplazar.jpg"> Realizar Desplazamiento</a></li>
                                    <li><a href="?controller=RealizarMantenimiento&action=RealizarMantenimientoByEquipo&codigoPatrimonial=<?php echo $equipo['codigoPatrimonial']; ?>"><img src="resources/images/desplazar.jpg"> Realizar Mantenimiento</a></li>
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
                            <td colspan="2"><a class="crearLink" href="?controller=Equipo&action=Crear">Crear Equipo</a></td>
                        </tr>
                    </tfoot>
                </table>
            </article>
        </section>
    </body>
</html>