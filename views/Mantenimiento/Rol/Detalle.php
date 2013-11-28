<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>

        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        
        <title>SIRALL2 - Detalle Rol</title>
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
                        <h2>Detalle Rol</h2>
                        <h4>Detalla la información del Rol</h4>
                    </hgroup>
                </header>
                <fieldset>
                    <legend>Detalle Rol</legend>
                    <table>
                        <tr>
                            <td><strong><abbr title="Código identificador">ID.</abbr> Rol:</strong></td>
                            <td><?php echo $rol->getIdRol(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Descripción:</strong></td>
                            <td><?php echo $rol->getDescripcion(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Permisos:</strong></td>
                            <td>
                                <div style="height: 300px; overflow-y: scroll;">
                                <?php
                                    foreach ($permisos as $permiso) {
                                        echo $permiso[0];
                                    }
                                ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="aEditar" href="?controller=Rol&action=Editar&idRol=<?php echo $rol->getIdRol(); ?>">Editar</a> |
                                <a class="aEliminar" href="?controller=Rol&action=Eliminar&idRol=<?php echo $rol->getIdRol(); ?>">Eliminar</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="?controller=Rol">Regresar</a></td>
                        </tr>
                    </table>
                </fieldset>
            </article>
        </section>
    </body>
</html>