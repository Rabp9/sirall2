<!-- File: /views/Registrar Usuario Sistema/index.php -->

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
                        <h2>Lista de Usuarios del Sistema</h2>
                        <h4>Usuarios del Sistema</h4>
                    </hgroup>
                </header>    
                <?php if(isset($mensaje)) { ?>
                <div id="mensaje" title="Mensaje"><p><?php echo $mensaje; ?></p></div>
                <?php } ?>
                <fieldset>
                    <legend>Lista de Usuarios del Sistema</legend>
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre de Usuario</th>
                                <th>Rol</th>
                                <th>Establecimiento</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(is_array($vwUsuarioSistemas)) {
                                foreach ($vwUsuarioSistemas as $vwUsuarioSistema) {
                        ?>
                        <tr>
                            <td><a href="?controller=RegistrarUsuarioSistema&action=Editar&username=<?php echo $vwUsuarioSistema->getUsername(); ?>"><?php echo $vwUsuarioSistema->getUsername(); ?></a></td>
                            <td><?php echo $vwUsuarioSistema->getRol(); ?></td>  
                            <td><?php echo $vwUsuarioSistema->getEstablecimiento(); ?></td>
                            <td><a class="aEliminar aeliminarUsuarioSistema" href="?controller=RegistrarUsuarioSistema&action=Eliminar&username=<?php echo $vwUsuarioSistema->getUsername(); ?>">Eliminar</a></td>
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