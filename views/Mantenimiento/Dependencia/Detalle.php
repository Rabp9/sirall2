<!-- File: /views/Mantenimiento/Dependencia/Detalle.php -->

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

        <title>SIRALL2 - Detalle Dependencia</title>
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
                        <h2>Detalle Dependencia</h2>
                        <h4>Detalla la información de la Dependencia</h4>
                    </hgroup>
                </header>
                <fieldset>
                    <legend>Detalle Dependencia</legend>
                    <table>
                        <tr>
                            <td><strong><abbr title="Código identificador">ID.</abbr> Dependencia:</strong></td>
                            <td><?php echo $dependencia->getIdDependencia(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Descripción:</strong></td>
                            <td><?php echo $dependencia->getDescripcion(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Red:</strong></td>
                            <td><?php echo $red->getDescripcion(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Dependencia Superior:</strong></td>
                            <td>
                                <?php if(!$superDependencia) { ?>
                                <div class="bubbleInfo">
                                    <span class="trigger"><?php echo $superDependencia->getDescripcion(); ?></span>
                                    <table class="popup">
                                        <tr>
                                            <td><strong><abbr title="Código identificador">ID.</abbr> Dependencia:</strong></td>
                                            <td><?php echo $superDependencia->getIdDependencia(); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Descripción:</strong></td>
                                            <td><?php echo $superDependencia->getDescripcion(); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Sub Dependencias:</strong></td>
                                            <td>
                                                <?php
                                                    if($superDependencia->getSuperIdDependencia() != NULL) {
                                                        echo $superDependencia->getSuperIdDependencia();
                                                    }
                                                    else { echo "<i>No pertenece a ninguna Dependencia</i>"; }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <?php } else { echo "<i>No pertenece a ninguna Dependencia</i>"; } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="aEditar" href="?controller=Dependencia&action=Editar&idDependencia=<?php echo $dependencia->getIdDependencia(); ?>">Editar</a> |
                                <a class="aEliminar" href="?controller=Dependencia&action=Eliminar&idDependencia=<?php echo $dependencia->getIdDependencia(); ?>">Eliminar</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="?controller=Dependencia">Regresar</a></td>
                        </tr>
                    </table>
                </fieldset>
            </article>
        </section>
    </body>
</html>