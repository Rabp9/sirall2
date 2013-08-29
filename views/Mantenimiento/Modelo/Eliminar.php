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
                            $('#frmEliminarModelo').submit();
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
        
        <title>SIRALL2 - Eliminar Modelo</title>
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
                        <h2>Eliminar Modelo</h2>
                        <h4>¿Está seguro de eliminar el Modelo?</h4>
                    </hgroup>
                </header>
                <form id="frmEliminarModelo" method="POST" action="?controller=Modelo&action=EliminarPOST">
                <fieldset>
                    <legend>Detalle Modelo</legend>
                    <input id="idModelo" type="hidden" value="<?php echo $modelo->getIdModelo(); ?>" name="idModelo"/>
                    <table>
                        <tr>
                            <td><strong><abbr title="Código identificador">ID.</abbr> Modelo:</strong></td>
                            <td><?php echo $modelo->getIdModelo(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tipo de Equipo:</strong></td>
                            <td>
                                <div class="bubbleInfo">
                                    <span class="trigger"><?php echo $tipoEquipo->getDescripcion(); ?></span>
                                    <table class="popup">
                                        <tr>
                                            <td><strong><abbr title="Código identificador">ID.</abbr> Tipo de Equipo:</strong></td>
                                            <td><?php echo $tipoEquipo->getIdTipoEquipo(); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Descripción:</strong></td>
                                            <td><?php echo $tipoEquipo->getDescripcion(); ?></td>  
                                        </tr>
                                    </table>
                                </div>
                            </td>  
                        </tr>
                        <tr>
                            <td><strong>Marca:</strong></td>
                            <td>
                                <div class="bubbleInfo">
                                    <span class="trigger"><?php echo $marca->getDescripcion(); ?></span>
                                    <table class="popup">
                                        <tr>
                                            <td><strong><abbr title="Código identificador">ID.</abbr> Marca:</strong></td>
                                            <td><?php echo $marca->getIdMarca(); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Descripción:</strong></td>
                                            <td><?php echo $marca->getDescripcion(); ?></td>  
                                        </tr>
                                    </table>
                                </div>
                            </td>  
                        </tr>
                        <tr>
                            <td><strong>Descripción:</strong></td>
                            <td><?php echo $modelo->getDescripcion(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Indicación:</strong></td>
                            <td><?php echo $modelo->getIndicacion(); ?></td>  
                        </tr>
                        <tr>
                              <td></td>
                              <td>
                                  <button id="enviar" type="button" value="" name="enviar">Eliminar</button>
                              </td>
                          </tr>
                          <tr>
                              <td colspan="2"><a href="?controller=Modelo">Regresar</a></td>
                          </tr>
                    </table>
                </fieldset>
                </form>
                <!-- Ventana de diálogo confirmar -->
                <div id="confirmar" title="Advertencia">
                    <p>¿Está seguro de eliminar el Modelo?</p>
                </div>
            </article>
        </section>
    </body>
</html>