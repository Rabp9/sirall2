<!-- File: /views/Registrar Usuario/index.php -->

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/selectable.css"/>
      
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript" src="resources/js/template.funciones.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#ulIdEstablecimiento li").click(function() {
                    if(!$(this).hasClass("ui-selected")) {
                        $(this).addClass("ui-selected");
                        $(this).find("input").prop("checked", true);
                    }
                    else {
                        $(this).removeClass("ui-selected");
                        $(this).find("input").prop("checked", false);
                    }
                });
            });
        </script>
            
        <title>SIRALL2 - Registrar Usuario</title>
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
                        <h2>Registrar Usuario</h2>
                        <h4>Registrar un usuario</h4>
                    </hgroup>
                </header>
                <form id="frmRegistrarUsuario" method="POST" action="?controller=RegistrarUsuario&action=RegistrarUsuarioPOST">
                    <fieldset>
                        <legend>Registrar Usuario</legend>
                        <div class="fieldset12">
                            <div class="fieldset1">
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
                                        <td colspan="2"><a href="?controller=RegistrarUsuario&action=Listar">Listar Usuarios</a></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="fieldset2">
                                Establecimiento
                                <ul id="ulIdEstablecimiento">
                                    <?php
                                        foreach ($establecimientos as $establecimiento) {
                                            echo "<li><input type='checkbox' name='establecimientos[]' value='" . $establecimiento->getIdEstablecimiento() . "'/>" . $establecimiento->getDescripcion() . "</li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>