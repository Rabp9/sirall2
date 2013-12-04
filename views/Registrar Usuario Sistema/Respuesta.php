<!-- File: /views/Registrar Usuario Sistema/Index.php -->

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
      
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript" src="resources/js/template.funciones.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
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
        <title>SIRALL2 - Registrar Usuario Sistema</title>
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
                        <h2>Registrar Usuario Sistema</h2>
                        <h4>Usuario del Sistema registrado</h4>
                    </hgroup>
                </header>
                <?php if(isset($mensaje)) { ?>
                <div id="mensaje" title="Mensaje"><p><?php echo $mensaje; ?></p></div>
                <?php } ?>
                <fieldset>
                    <legend>Confirmación Usuario Sistema</legend>
                    <table>
                        <tr>
                            <td><strong>Nombre de Usuario</strong></td>
                            <td><?php echo $usuarioSistema->getUsername(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Rol:</strong></td>
                            <td><?php echo $rol->getDescripcion(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Password:</strong></td>
                            <td><?php echo preg_replace("/[A-Za-z0-9]/", "*", $usuarioSistema->getPassword()); ?></td>  
                        </tr>
                    </table>
                </fieldset>
                <fieldset>
                    <legend>Lista de Usuarios del Sistema</legend>
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre de Usuario</th>
                                <th>Rol</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(is_array($vwUsuarioSistemas)) {
                                foreach ($vwUsuarioSistemas as $vwUsuarioSistema) {
                        ?>
                        <tr>
                            <td><a href="#"><?php echo $vwUsuarioSistema->getUsername(); ?></a></td>
                            <td><?php echo $vwUsuarioSistema->getRol(); ?></td>
                            <td><a class="aEliminar aeliminarUsuarioSistema" href="#">Eliminar</a></td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                </fieldset>
            </article>
        </section>
    </body>
</html>