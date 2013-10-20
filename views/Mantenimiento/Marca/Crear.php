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
                isRequired($('#txtDescripcion'));
                setValue($('#txtIdMarca'), '<?php echo $nextID; ?>');
                isReadOnly($('#txtIdMarca'));
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $('#txtDescripcion').focus();
            });
        </script>
        
        <title>SIRALL2 - Crear Marca</title>
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
                        <h2>Crear Marca</h2>
                        <h4>Crea una Marca</h4>
                    </hgroup>
                </header>
                <form id="frmCrearMarca" method="POST" action="?controller=Marca&action=CrearPOST">
                    <fieldset>
                        <legend>Crear Marca</legend>
                        <table>
                            <tr>
                                <td><label for="txtIdMarca"><abbr title="Código identificador">ID.</abbr> Marca</label></td>
                                <td><input id="txtIdMarca" type="text" name="idMarca"></td>
                            </tr>
                            <tr>
                                <td><label for="txtDescripcion">Descripción</label></td>
                                <td><input id="txtDescripcion" type="text" name="descripcion" placeholder="Escribe una descripción"></td>  
                            </tr>
                            <tr>
                                <td><label for="txtIndicacion">Indicación</label></td>
                                <td><textarea id="txtIndicacion" name="indicacion" placeholder="Escribe una indicación" ></textarea></td>  
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Marca">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>