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
                isRequired($('#txtDescripcion'));
                setValue($('#txtIdRed'), <?php echo $nextID; ?>);
                isReadOnly($('#txtIdRed'));
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $('#txtDescripcion').focus();
            });
        </script>
        
        <title>SIRALL2 - Crear Red</title>
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
                        <h2>Crear Red</h2>
                        <h4>Crea una Red</h4>
                    </hgroup>
                </header>
                <form id="frmCrearRed" method="POST" action="?controller=Red&action=CrearPOST">
                    <fieldset>
                        <legend>Crear Red</legend>
                        <table>
                            <tr>
                                <td><label for="txtIdRed"><abbr title="Código identificador">ID.</abbr> Red</label></td>
                                <td><input id="txtIdRed" type="text" name="idRed"></td>
                            </tr>
                            <tr>
                                <td><label for="txtDescripcion">Descripcion</label></td>
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
                                <td colspan="2"><a href="?controller=Red">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>