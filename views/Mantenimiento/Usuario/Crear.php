<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
      
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.js"></script>
        <script type="text/javascript" src="resources/js/funciones.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                isRequiusuario($('#txtDescripcion'));
                setValue($('#txtIdUsuario'), <?php echo $nextID; ?>);
                isReadOnly($('#txtIdUsuario'));
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $('#txtDescripcion').focus();
            });
        </script>
        
        <title>SIRALL2 - Crear Usuario</title>
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
                        <h2>Crear Usuario</h2>
                        <h4>Crea un Usuario</h4>
                    </hgroup>
                </header>
                <form id="frmCrearUsuario" method="POST" action="?controller=Usuario&action=CrearPOST">
                    <fieldset>
                        <legend>Crear Usuario</legend>
                        <table>
                            <tr>
                                <td><label for="txtIdUsuario"><abbr title="Código identificador">ID.</abbr> Usuario</label></td>
                                <td><input id="txtIdUsuario" type="text" name="idUsuario"></td>
                            </tr>
                            <tr>
                                <td><label for="txtDescripcion">Red:</label></td>
                                <td><input id="txtDescripcion" type="text" name="descripcion" placeholder="Escribe una descripción"></td>  
                            </tr>
                            <tr>
                                <td><label for="txtDirección">Dirección</label></td>
                                <td><textarea id="txtdireccion" name="direccion" placeholder="Escribe una dirección"></textarea></td>  
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Usuario">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>