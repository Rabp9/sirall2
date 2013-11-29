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
                        <h4>Registrar un usuario del Sistema</h4>
                    </hgroup>
                </header>
                <form id="frmRegistrarUsuarioSistema" method="POST" action="?controller=RegistrarUsuarioSistema&action=RegistrarUsuarioSistemaPOST">
                    <fieldset>
                        <legend>Registrar Usuario Sistema</legend>
                        <table>
                            <tr>
                                <td><label for="sltIdRol">Rol</label></td>
                                <td>
                                    <select id="sltIdRol" name="idRol">
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
                                <td><label for="txtUsername">Nombre de Usuario</label></td>
                                <td><input id="txtUsername" type="text" name="username" placeholder="Escribe un nombre de Usuario"></td>  
                            </tr>
                            <tr>
                                <td><label for="pswdPassword">Password</label></td>
                                <td><input id="pswdPassword" type="password" name="password" placeholder="Escribe un password" /></td>  
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=RegistrarUsuarioSistema">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>