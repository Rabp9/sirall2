<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
       
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.js"></script>
        <script type="text/javascript" src="resources/js/jquery.codaPopupBubbles.js"></script>
        <script>
            $(document).ready(function() {
                $( '#confirmar' ).dialog({
                    autoOpen: false,
                    modal: true,
                    show: {
                        effect: "blind",
                        duration: 1000
                    },
                    hide: {
                        effect: "explode",
                        duration: 1000
                    },
                    buttons: {
                        "Sí": function() {
                            $('#frmEliminarRed').submit();
                        },
                        "No": function() {
                            $(this).dialog("close");
                        }
                    }
                });
                
                $('#enviar').button().focus();
                
                $('#enviar').click(function() {
                    $('#confirmar').dialog('open');
                });
            });
        </script>
        
        <title>SIRALL2 - Eliminar Red</title>
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
                        <h2>Eliminar Red</h2>
                        <h4>¿Está seguro de eliminar la Red?</h4>
                    </hgroup>
                </header>
                <form id="frmEliminarRed" method="POST" action="?controller=Red&action=EliminarPOST">
                     <fieldset>
                        <legend>Eliminar Red</legend>
                        <input id="idRed" type="hidden" value="<?php echo $red->getIdRed(); ?>" name="idRed"/>
                        <table>
                            <tr>
                                <td><strong><abbr title="Código identificador">ID.</abbr> Red:</strong></td>
                                <td><?php echo $red->getIdRed(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Descripción:</strong></td>
                                <td><?php echo $red->getDescripcion(); ?></td>  
                            </tr>
                            <tr>
                                <td><strong>Dirección:</strong></td>
                                <td><?php echo $red->getDireccion(); ?></td>  
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
                    <p>¿Está seguro de eliminar la Red?</p>
                </div>
            </article>
        </section>
    </body>
</html>