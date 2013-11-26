<!-- File: /views/Mantenimiento/Usuario/Eliminar.php -->

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
        <script type="text/javascript" src="resources/js/template.eliminar.js"></script>
        
        <title>SIRALL2 - Eliminar Usuario</title>
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
                        <h2>Eliminar Usuario</h2>
                        <h4>¿Está seguro de eliminar el Usuario?</h4>
                    </hgroup>
                </header>
                <form id="frmEliminarUsuario" method="POST" action="?controller=Usuario&action=EliminarPOST">
                     <fieldset>
                        <legend>Eliminar Usuario</legend>
                        <input id="idUsuario" type="hidden" value="<?php echo $usuario->getIdUsuario(); ?>" name="idUsuario"/>
                        <table>
                            <tr>
                                <td><strong><abbr title="Código identificador">ID.</abbr> Usuario:</strong></td>
                                <td><?php echo $usuario->getIdUsuario(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Dependencia:</strong></td>
                                <td><?php echo $dependencia->getDescripcion(); ?></td>  
                            </tr>
                            <tr>
                                <td><strong>Red:</strong></td>
                                <td><?php echo $red->getDescripcion(); ?></td>  
                            </tr>
                            <tr>
                                <td><strong>Nombres:</strong></td>
                                <td><?php echo $usuario->getNombres(); ?></td>  
                            </tr>
                            <tr>
                                <td><strong>Apellido Paterno:</strong></td>
                                <td><?php echo $usuario->getApellidoPaterno(); ?></td>  
                            </tr>
                            <tr>
                                <td><strong>Apellido Materno:</strong></td>
                                <td><?php echo $usuario->getApellidoMaterno(); ?></td>  
                            </tr>
                            <tr>
                                <td><strong>Correo:</strong></td>
                                <td><?php echo $usuario->getCorreo(); ?></td>  
                            </tr>
                            <tr>
                                <td><strong>RPM:</strong></td>
                                <td><?php echo $usuario->getRpm(); ?></td>  
                            </tr>
                            <tr>
                                <td><strong>Anexo:</strong></td>
                                <td><?php echo $usuario->getAnexo(); ?></td>  
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="enviar" type="button" value="" name="enviar">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Red">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <!-- Ventana de diálogo confirmar -->
                <div id="confirmar" title="Advertencia">
                    <p>¿Está seguro de eliminar el Usuario?</p>
                </div>
            </article>
        </section>
    </body>
</html>