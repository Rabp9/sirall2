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
                $("#sltIdRol").val(<?php echo $usuarioSistema->getIdRol(); ?>);
                $("#sltIdEstablecimiento").val("<?php echo $usuarioSistema->getIdEstablecimiento(); ?>");
                $("#txtUsername").val("<?php echo $usuarioSistema->getUsername(); ?>");
                $("#pswdPassword").val("<?php echo $usuarioSistema->getPassword(); ?>");
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
                        <h2>Editar Usuario Sistema</h2>
                        <h4>Editar un usuario del Sistema</h4>
                    </hgroup>
                </header>
                <form id="frmEditarUsuarioSistema" method="POST" action="?controller=RegistrarUsuarioSistema&action=EditarPOST">
                    <fieldset>
                        <legend>Registrar Usuario Sistema</legend>
                        <table>
                            <tr>
                                <td><label for="sltIdRol">Rol</label></td>
                                <td>
                                    <select id="sltIdRol" name="idRol" required="true">
                                        <option disabled selected value="">Selecciona un Rol</option>
                                        <?php
                                            if(is_array($roles)) {
                                                foreach ($roles as $rol) {
                                                    echo "<option value='" . $rol->getIdRol() . "'>" . $rol->getDescripcion() . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="sltIdEstablecimiento">Establecimiento</label></td>
                                <td>
                                    <select id="sltIdEstablecimiento" name="idEstablecimiento" required="true">
                                        <option disabled selected value="">Selecciona un Establecimiento</option>
                                        <?php
                                            if(is_array($establecimientos)) {
                                                foreach ($establecimientos as $establecimiento) {
                                                    echo "<option value='" . $establecimiento->getIdEstablecimiento() . "'>" . $establecimiento->getDescripcion() . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="txtUsername">Nombre de Usuario</label></td>
                                <td><input id="txtUsername" type="text" name="username" placeholder="Escribe un nombre de Usuario" required="true"></td>  
                            </tr>
                            <tr>
                                <td><label for="pswdPassword">Password</label></td>
                                <td><input id="pswdPassword" type="password" name="password" placeholder="Escribe un password" required="true"/></td>  
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=RegistrarUsuarioSistema&action=Listar">Listar Usuarios</a></td>
                            </tr>
                        </table>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>