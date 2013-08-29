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
        <script type="text/javascript" src="resources/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#chbDependencia').button();
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $('#chbDependencia').change(function(){
                    if($(this).is(':checked'))
                        $('#cbo').css('display', 'table-cell');
                    else
                        $('#cbo').css('display', 'none');
                });
                $("#cboMarca").change(function() {
                    $('#cboModelo').empty();
                    $('#cboModelo').append('<option disabled selected>Selecciona un Modelo</option>');
                    $.ajax({
                        url: 'Index.php',
                        type: 'GET',
                        data: {
                            controller: 'NuevoLote',
                            action: 'getModelobyIdMarca',
                            idMarca: $(this).val()
                        },
                        success: function(data) {
                            if($(data).find('modelo').length !== 0 ) {
                                $(data).find('modelo').each(function() {
                                    var option = new Option($(this).find('descripcion').text(), $(this).find('idModelo').text());
                                    $('#cboModelo').append(option);
                                });
                            }
                        }
                    }); 
                });
            });
            
            function pressEnter(event) {
                if(event.keyCode === 13) {
                    var filas = $('#campos tbody').find('tr').length;
                    var tabindex = $(event.target).attr('tabindex');
                    if((parseInt(tabindex) + 1) / 2 === filas) 
                        $('#campos tbody').append("<tr><td><input type='text' name='c" + filas + "' tabindex='" + (parseInt(tabindex) + 1)  + "' onkeypress='return pressEnter(event);'></td><td><input type='text' name='s" + filas + "' tabindex='" + (parseInt(tabindex) + 2)  + "' onkeypress='return pressEnter(event);'></td></tr>");
                    tabindex++; //increment tabindex
                    $("input[tabindex=" + tabindex + "]").focus();
                }
            }
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
                                <td>
                                    <select id="cboModelo" name="idModelo" required="true">
                                        <option disabled selected>Selecciona un Modelo</option>
                                    </select></td>  
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table id="campos">
                                        <caption>Ingrese el Código Patrimonial y la serie del Equipo</caption>
                                        <thead>
                                            <tr>
                                                <td>Código Patrimonial</td>
                                                <td>Serie</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" tabindex="0" name="c0" onkeypress="return pressEnter(event);"></td>
                                                <td><input type="text" tabindex="1" name="s0" onkeypress="return pressEnter(event);"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input id="chbDependencia" type="checkbox"/> 
                                    <label for="chbDependencia">Asginar a Dependencia</label>
                                    <div id="cbo" style="display: none;" >
                                        <input id="cboDependencia" type="hidden" name="idDependencia"/>
                                        <select id="cbo0">
                                            <option disabled selected>Selecciona una Dependencia</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                        </table>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>