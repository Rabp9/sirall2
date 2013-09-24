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
                setValue($('#txtCodigoPatrimonial'), <?php echo $equipo->getCodigoPatrimonial(); ?>);
                setValue($('#txtSerie'), '<?php echo $equipo->getSerie(); ?>');
                isReadOnly($('#txtCodigoPatrimonial'));
                isReadOnly($('#txtSerie'));
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $('#txtDescripcion').select();
            });
        </script>
        
        <title>SIRALL2 - Editar Equipo</title>
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
                        <h2>Editar Equipo</h2>
                        <h4>Edita el Equipo</h4>
                    </hgroup>
                </header>
                <form id="frmEditarEquipo" method="POST" action="?controller=Equipo&action=EditarPOST">
                    <fieldset>
                        <legend>Editar Equipo</legend>
                        <table>
                            <tr>
                                <td><label for="txtCodigoPatrimonial">Código Patrimonial</label></td>
                                <td><input id="txtCodigoPatrimonial" type="text" name="idEquipo"></td>
                            </tr>
                            <tr>
                                <td><label for="txtSerie">Serie</label></td>
                                <td><input id="txtSerie" type="text" name="serie" placeholder="Escribe la serie"></td>  
                            </tr>
                            <tr>
                                <td><label for="cboTipoEquipo">Tipo de Equipo</label></td>
                                <td>
                                    <select id="cboTipoEquipo" name="idTipoEquipo">
                                        <option disabled selected value="">Selecciona un Tipo de Equipo</option>
                                        <?php 
                                            if($tipoEquipos) { 
                                                foreach ($tipoEquipos as $tipoEquipo) {        
                                                    if($tipoEquipo->getIdTipoEquipo() == $equipo->getIdTipoEquipo())
                                                        echo "<option value='" . $tipoEquipo->getIdTipoEquipo() . "' selected>" . $tipoEquipo->getDescripcion() . "</option>";
                                                    else
                                                        echo "<option value='" . $tipoEquipo->getIdTipoEquipo() . "'>" . $tipoEquipo->getDescripcion() . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Equipo">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>