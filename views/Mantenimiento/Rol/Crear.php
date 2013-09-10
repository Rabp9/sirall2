<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/jquery.dataTables_themeroller.css"/>
      
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
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
                $('#txtDescripcion').focus();
                (function ($) {
    $.fn.styleTable = function (options) {
        var defaults = {
            css: 'ui-styled-table'
        };
        options = $.extend(defaults, options);

        return this.each(function () {
            $this = $(this);
            $this.addClass(options.css);

            $this.on('mouseover mouseout', 'tbody tr', function (event) {
                $(this).children().toggleClass("ui-state-hover",
                                               event.type == 'mouseover');
            });

            $this.find("th").addClass("ui-widget-header");
            $this.find("td").addClass("ui-widget-content");
            $this.find("tr:last-child").addClass("last-child");
        });
    };
})(jQuery);
$('#tblPermisos').styleTable();
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
                                        <input id="chbRestDependencia" type="checkbox" name="restRed"/> <label for="chbRestDependencia"> Restringir Usuario a objetos de su Dependencia</label>
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