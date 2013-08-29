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
                isReadOnly($('#txtIdMarca'));
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $('#txtDescripcion').focus();
            });
        </script>
        
        <title>SIRALL2 - Nuevo Lote</title>
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
                        <h2>Nuevo Lote</h2>
                        <h4>Registra un nuevo Lote de equipos</h4>
                    </hgroup>
                </header>
                <form id="frmNuevoLote" method="POST" action="?controller=Marca&action=CrearPOST">
                    <fieldset>
                        <legend>Nuevo Lote</legend>
                        <table>
                            <tr>
                                <td><label for="cboMarca">Marca</label></td>
                                <td>
                                    <select id="cboMarca" name="idMarca" required="true">
                                        <option disabled selected>Selecciona una Marca</option>
                                        <?php 
                                            if($marcas) { 
                                                foreach ($marcas as $marca) {
                                                    echo "<option value='" . $marca->getIdMarca() . "'>" . $marca->getDescripcion() . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="cboModelo">Modelo</label></td>
                                <td><input id="txtDescripcion" type="text" name="descripcion" placeholder="Escribe una descripción"></td>  
                            </tr>
                            <tr>
                                <td colspan="2">Ingrese el Código Patrimonial y la serie del Equipo</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td>Código Patrimonial</td>
                                                <td>Serie</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input></td>
                                                <td><input></td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                                <td colspan="2"><a href="?controller=Marca">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>