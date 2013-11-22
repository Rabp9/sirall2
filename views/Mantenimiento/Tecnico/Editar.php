<!-- File: /views/Mantenimiento/Tecnico/Editar.php -->

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
                isRequired($('#txtNombres'));
                isRequired($('#txtApellidoPaterno'));
                isRequired($('#txtApellidoMaterno'));
                setValue($('#txtIdTecnico'), '<?php echo $tecnico->getIdTecnico(); ?>');
                setValue($('#txtNombres'), '<?php echo $tecnico->getNombres(); ?>');
                setValue($('#txtApellidoPaterno'), '<?php echo $tecnico->getApellidoPaterno(); ?>');
                setValue($('#txtApellidoMaterno'), '<?php echo $tecnico->getApellidoMaterno(); ?>');
                setValue($('#txtRpm'), '<?php echo $tecnico->getRpm(); ?>');
                isReadOnly($('#txtIdTecnico'));
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $('#txtNombres').select();
            });
        </script>
        
        <title>SIRALL2 - Editar Técnico</title>
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
                        <h2>Editar Técnico</h2>
                        <h4>Edita el Técnico</h4>
                    </hgroup>
                </header>
                <form id="frmCrearTécnico" method="POST" action="?controller=Tecnico&action=EditarPOST">
                    <fieldset>
                        <legend>Editar Técnico</legend>
                        <table>
                              <tr>
                                <td><label for="txtIdTecnico"><abbr title="Código identificador">ID.</abbr> Técnico</label></td>
                                <td><input id="txtIdTecnico" type="text" name="idTecnico"></td>
                            </tr>
                            <tr>
                                <td><label for="txtNombres">Nombres</label></td>
                                <td><input id="txtNombres" type="text" name="nombres" placeholder="Escriba el nombre"></td>  
                            </tr>
                            <tr>
                                <td><label for="txtApellidoPaterno">Apellido Paterno</label></td>
                                <td><input id="txtApellidoPaterno" type="text" name="apellidoPaterno" placeholder="Escriba el apellido paterno"/></td>  
                            </tr>
                            <tr>
                                <td><label for="txtApellidoMaterno">Apellido Paterno</label></td>
                                <td><input id="txtApellidoMaterno" type="text" name="apellidoMaterno" placeholder="Escriba el apellido materno"/></td>  
                            </tr>
                            <tr>
                                <td><label for="txtRpm">RPM</label></td>
                                <td><input id="txtRpm" type="text" name="rpm" placeholder="Escriba el RPM"/></td>  
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Tecnico">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>