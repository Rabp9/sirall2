<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
       
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript" src="resources/js/template.eliminar.js"></script>
        
        <title>SIRALL2 - Eliminar Equipo</title>
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
                        <h2>Eliminar Equipo</h2>
                        <h4>¿Está seguro de eliminar el Equipo?</h4>
                    </hgroup>
                </header>
                <form id="frmEliminarEquipo" method="POST" action="?controller=Equipo&action=EliminarPOST">
                    <fieldset>
                        <legend>Detalle Equipo</legend>
                        <table>
                            <tr>
                                <td><strong>Código Patrimonial:</strong></td>
                                <td><?php echo $equipo->getCodigoPatrimonial(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Serie:</strong></td>
                                <td><?php echo $equipo->getSerie(); ?></td>  
                            </tr>
                            <tr>
                                <td><strong>Modelo:</strong></td>
                                <td><?php echo $modelo->getDescripcion(); ?></td>  
                            </tr>
                            <tr>
                                <td><strong>Marca:</strong></td>
                                <td><?php echo $marca->getDescripcion(); ?></td>  
                            </tr>
                            <tr>
                                <td><strong>Tipo de Equipo:</strong></td>
                                <td><?php echo $tipoEquipo->getDescripcion(); ?></td>  
                            </tr>
                            <tr>
                                <td><strong>Usuario:</strong></td>
                                <td><?php echo $usuario->getApellidoPaterno() . ' ' . $usuario->getApellidoMaterno() . ', ' . $usuario->getNombres(); ?></td>  
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
                                <td><strong>Indicacion:</strong></td>
                                <td><?php echo $equipo->getIndicacion(); ?></td>  
                            </tr>
                            <tr>
                                <td>
                                    <a href="?controller=Equipo&action=Editar&idEquipo=<?php echo $equipo->getCodigoPatrimonial(); ?>">Editar</a> |
                                    <a href="?controller=Equipo&action=Eliminar&idEquipo=<?php echo $equipo->getCodigoPatrimonial(); ?>">Eliminar</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Equipo">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <!-- Ventana de diálogo confirmar -->
                <div id="confirmar" title="Advertencia">
                    <p>¿Está seguro de eliminar la Equipo?</p>
                </div>
            </article>
        </section>
    </body>
</html>