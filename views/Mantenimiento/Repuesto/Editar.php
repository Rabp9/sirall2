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
                setValue($('#txtIdRepuesto'), <?php echo $repuesto->getIdRepuesto(); ?>);
                isReadOnly($('#txtIdRepuesto'));
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $('#txtDescripcion').select();
            });
        </script>
        
        <title>SIRALL2 - Editar Repuesto</title>
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
                        <h2>Editar Repuesto</h2>
                        <h4>Edita el Repuesto</h4>
                    </hgroup>
                </header>
                <form id="frmEditarRepuesto" method="POST" action="?controller=Repuesto&action=EditarPOST">
                    <fieldset>
                        <legend>Editar Repuesto</legend>
                        <table>
                            <tr>
                                <td><label for="txtIdRepuesto"><abbr title="Código identificador">ID.</abbr> Repuesto</label></td>
                                <td><input id="txtIdRepuesto" type="text" name="idRepuesto"></td>
                            </tr>
                            <tr>
                                <td><label for="txtDescripcion">Descripción</label></td>
                                <td><input id="txtDescripcion" type="text" name="descripcion" placeholder="Escribe una descripción" value="<?php echo $repuesto->getDescripcion(); ?>"></td>  
                            </tr>
                            <tr>
                                <td><label for="txtUnidadMedida">UnidadMedida</label></td>
                                <td><input id="txtUnidadMedida" type="text" name="unidadMedida" placeholder="Escribe una uidadMedida" value="<?php echo $repuesto->getUnidadMedida(); ?>"></td>  
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Repuesto">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>