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
        <script type="text/javascript">
            $(document).ready(function() {
                $('#btnAsignarJefeDependencia').button().focus().click(function() {
                    window.location = "?controller=AsignarJefeDependencia";
                });
                $( "#mensaje" ).dialog({
                    closeOnEscape: true,
                    show: 'fade',
                    hide: 'fade',
                    open: function(event, ui){
                        setTimeout("$('#mensaje').dialog('close')",3000);
                    },
                    position: { 
                        at: "right top", 
                        of: window
                    },
                    buttons: [
                        {
                            text: "OK",
                            click: function() {
                                $( this ).dialog( "close" );
                            }
                        }
                    ]
                });
            });
        </script>

        <title>SIRALL2 - Asignar Jefe de Dependencia</title>
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
                        <h2>Confirmación - Asignar Jefe de Dependencia</h2>
                        <h4>Confirmación de asignación de Jefe de Dependencia</h4>
                    </hgroup>
                </header>
                <?php if(isset($mensaje)) { ?>
                <div id="mensaje" title="Mensaje"><p><?php echo $mensaje; ?></p></div>
                <?php } ?>
                <fieldset>
                    <legend>Información de Dependencia</legend>
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
                                <?php if($superDependencia != NULL) { ?>
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
                            <td><strong>Jefe o Responsable:</strong></td>
                            <td><?php echo $usuario->getApellidoPaterno() . ' ' . $usuario->getApellidoMaterno() . ' ' . $usuario->getNombres(); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button id="btnAsignarJefeDependencia" type="button">Asignar Jefe Dependencia</button>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </article>
        </section>
    </body>
</html>