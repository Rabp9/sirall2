<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
      
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/jquery.styleTable.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript" src="resources/js/template.funciones.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                isRequired($('#txtDescripcion'));
                setValue($('#txtIdRol'), <?php echo $nextID; ?>);
                isReadOnly($('#txtIdRol'));
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $('#chbRestRed').button();
                $('#chbRestDependencia').button();
                $("#chbRestDependencia" ).button({ disabled: true });
                $('#txtDescripcion').focus();
                
                $('#tblPermisos').styleTable(event);
                $('#tblPermisos tbody td').click(function() {
                        var $checkbox = $(this).find('input.chPermiso');
                        $checkbox.prop('checked', !$checkbox.prop('checked'));
                });
                
                $('#tblPermisos input').click(function(event) {
                    var $input = $(this);
                    var r = false;
                    $('#tblPermisos tbody tr:first td').each(function(index) {
                        if($(this).find('input').attr('name') === $input.attr('name')) 
                            r = true;
                    });
                    if(!r)
                        event.stopPropagation();
                });
                
                $('#tblPermisos tbody tr:first td').click(function() {
                    var $td = $(this);
                    var col;
                    $(this).parent().children().each(function(index) {
                        if($td.find('input').attr('name') === $(this).find('input').attr('name'))
                            col = index;
                    });
                    $('#tblPermisos tbody tr').each(function() {
                        $(this).children().each(function(index) {
                            if(col === index) {
                                var $checkbox = $(this).find('input.chPermiso');
                                $checkbox.prop('checked', !$checkbox.prop('checked'));
                                $td.find('input').prop('checked', $checkbox.prop('checked'));
                            }
                        });
                    });
                });
                $('#chbRestRed').change(function() {
                    if($(this).prop('checked'))
                        $('#chbRestDependencia').button({ disabled: false });
                    else
                        $('#chbRestDependencia').button({ disabled: true });
                });
            });
        </script>
        
        <title>SIRALL2 - Crear Rol</title>
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
                        <h2>Crear Rol</h2>
                        <h4>Crea un Rol</h4>
                    </hgroup>
                </header>
                <form id="frmCrearRol" method="POST" action="?controller=Rol&action=CrearPOST">
                    <fieldset>
                        <legend>Crear Rol</legend>
                        <table>
                            <tr>
                                <td><label for="txtIdRol"><abbr title="Código identificador">ID.</abbr> Rol</label></td>
                                <td><input id="txtIdRol" type="text" name="idRol"></td>
                            </tr>
                            <tr>
                                <td><label for="txtDescripcion">Descripcion</label></td>
                                <td><input id="txtDescripcion" type="text" name="descripcion" placeholder="Escribe una descripción"></td>  
                            </tr>
                        </table>
                        
                        <table id="tblPermisos">
                            <caption>Permisos</caption>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tipo de Equipo</th>
                                    <th>Modelo</th>
                                    <th>Marca</th>
                                    <th>Equipo</th>
                                    <th>Repuesto</th>
                                    <th>Usuario</th>
                                    <th>Redes y Dependencias</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Control Total</td>
                                    <td><input class="chPermiso" type="checkbox" name="ct1"></td>
                                    <td><input class="chPermiso" type="checkbox" name="ct2"></td>
                                    <td><input class="chPermiso" type="checkbox" name="ct3"></td>
                                    <td><input class="chPermiso" type="checkbox" name="ct4"></td>
                                    <td><input class="chPermiso" type="checkbox" name="ct5"></td>
                                    <td><input class="chPermiso" type="checkbox" name="ct6"></td>
                                    <td><input class="chPermiso" type="checkbox" name="ct7"></td>
                                </tr>
                                <tr>
                                    <td>Mostrar</td>
                                    <td><input class="chPermiso" type="checkbox" name="mst1"></td>
                                    <td><input class="chPermiso" type="checkbox" name="mst2"></td>
                                    <td><input class="chPermiso" type="checkbox" name="mst3"></td>
                                    <td><input class="chPermiso" type="checkbox" name="mst4"></td>
                                    <td><input class="chPermiso" type="checkbox" name="mst5"></td>
                                    <td><input class="chPermiso" type="checkbox" name="mst6"></td>
                                    <td><input class="chPermiso" type="checkbox" name="mst7"></td>
                                </tr>
                                <tr>
                                    <td>Modificar</td>
                                    <td><input class="chPermiso" type="checkbox" name="mdf1"></td>
                                    <td><input class="chPermiso" type="checkbox" name="mdf2"></td>
                                    <td><input class="chPermiso" type="checkbox" name="mdf3"></td>
                                    <td><input class="chPermiso" type="checkbox" name="mdf4"></td>
                                    <td><input class="chPermiso" type="checkbox" name="mdf5"></td>
                                    <td><input class="chPermiso" type="checkbox" name="mdf6"></td>
                                    <td><input class="chPermiso" type="checkbox" name="mdf7"></td>
                                </tr>
                                <tr>
                                    <td>Eliminar</td>
                                    <td><input class="chPermiso" type="checkbox" name="elm1"></td>
                                    <td><input class="chPermiso" type="checkbox" name="elm2"></td>
                                    <td><input class="chPermiso" type="checkbox" name="elm3"></td>
                                    <td><input class="chPermiso" type="checkbox" name="elm4"></td>
                                    <td><input class="chPermiso" type="checkbox" name="elm5"></td>
                                    <td><input class="chPermiso" type="checkbox" name="elm6"></td>
                                    <td><input class="chPermiso" type="checkbox" name="elm7"></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8">
                                        <input id="chbRestRed" type="checkbox" name="restRed"/> <label for="chbRestRed"> Restringir Usuario a objetos de su Red</label>
                                    </td>  
                                </tr>
                                <tr>
                                    <td colspan="8">
                                        <input id="chbRestDependencia" type="checkbox" name="restDependencia"/> <label for="chbRestDependencia"> Restringir Usuario a objetos de su Dependencia</label>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <table>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Rol">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>