<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/jquery.dataTables_themeroller.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/jquery.treeview.css"/>
       
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#btnListamatenimiento').button().focus().click(function() {
                    window.location = "?controller=RealizarMantenimiento";
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
        <title>SIRALL2 - Realizar Mantenimiento de Equipo</title>
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
                        <h2>Realizar Mantenimiento de Equipo</h2>
                        <h4>Registra el mantenimiento de un Equipo</h4>
                    </hgroup>
                </header>        
                <?php if(isset($mensaje)) { ?>
                <div id="mensaje" title="Mensaje"><p><?php echo $mensaje; ?></p></div>
                <?php } ?>
                <fieldset>
                    <legend>Información de Mantenimiento</legend>
                    <table>
                        <tr>
                            <td><strong>Código Patrimonial:</strong></td>
                            <td><?php echo $equipo['codigoPatrimonial']?></td>
                        </tr>
                        <tr>
                            <td><strong>Serie:</strong></td>
                            <td><?php echo $equipo['serie']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Modelo:</strong></td>
                            <td><?php echo $equipo['modelo']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Marca:</strong></td>
                            <td><?php echo $equipo['marca']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Tipo de Equipo:</strong></td>
                            <td><?php echo $equipo['tipoEquipo']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Usuario:</strong></td>
                            <td><?php echo $equipo['usuario']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Dependencia:</strong></td>
                            <td><?php echo $equipo['dependencia']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Establecimiento:</strong></td>
                            <td><?php echo $equipo['establecimiento']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Indicacion:</strong></td>
                            <td><?php echo $equipo['indicacion']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Motivo:</strong></td>
                            <td><?php echo $mantenimiento->getMotivo(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Fecha de último Mantenimiento:</strong></td>
                            <td><?php echo $equipo['fechaUltimo']; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Número de matenimientos:</strong></td>
                            <td><?php echo $equipo['numeroMan']; ?></td>  
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button id="btnListamatenimiento" type="button">Ir a Lista de matenimientos</button>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </article>
        </section>
    </body>
</html>