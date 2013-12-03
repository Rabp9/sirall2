<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/jquery.list2cols.css"/>
              <link rel="stylesheet" type="text/css" href="resources/css/jquery.datos.css" />
              
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/jquery.styleTable.js"></script>
        <script type="text/javascript" src="resources/js/jquery.list2cols.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript" src="resources/js/template.funciones.js"></script>
        <script type="text/javascript" src="resources/js/template.crearDatos.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                isRequired($('#txtDescripcion'));
                setValue($('#txtIdTipoEquipo'), '<?php echo $nextID; ?>');
                isReadOnly($('#txtIdTipoEquipo'));
                $('#btnEnviar').button();
                $('#btnBorrar').button();
                $('#txtDescripcion').focus();
            });
        </script>
        
        <title>SIRALL2 - Crear Tipo de Equipo</title>
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
                        <h2>Crear Tipo de Equipo</h2>
                        <h4>Crea un Tipo de Equipo</h4>
                    </hgroup>
                </header>
                <form id="frmCrearTipoEquipo" method="POST" action="?controller=TipoEquipo&action=CrearPOST">
                    <fieldset>
                        <legend>Crear Tipo de Equipo</legend>
                        <fieldset>
                            <legend>Información de Tipo de Equipo</legend>
                            <table>
                                <tr>
                                    <td><label for="txtIdTipoEquipo"><abbr title="Código identificador">ID.</abbr> Tipo de Equipo</label></td>
                                    <td><input id="txtIdTipoEquipo" type="text" name="idTipoEquipo"></td>
                                </tr>
                                <tr>
                                    <td><label for="txtDescripcion">Descripción</label></td>
                                    <td><input id="txtDescripcion" type="text" name="descripcion" placeholder="Escribe una descripción"></td>  
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Detalle de Tipo de Equipo</legend>
                                <table id="tblOpciones">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Opción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <button class="btnAgregar" type="button">Agregar</button>
                                                <button class="btnEditar" type="button">Editar</button>
                                                <button class="btnEliminar" type="button">Eliminar</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
            
                                <div id="dvOpcion-dlg" title="Opción...">
                                    <p>Descripción</p>
                                    <p><input type="text" id="txtOpcion" placeholder="Descripción" /></p>
                                </div>
            
                                <div id="dvSubOpcion-dlg" title="Sub-Opción..."> 
                                    <p>Descripción</p>
                                    <p><input type="text" id="txtSubOpcion" placeholder="Descripción" /></p>
                                    <table id="tblSubOpciones">
                                        <thead>
                                            <tr>
                                                <th>Sub-Opción</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>
                                                    <button class="btnAgregar" type="button">Agregar</button>
                                                    <button class="btnEditar" type="button">Editar</button>
                                                    <button class="btnEliminar" type="button">Eliminar</button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                        </fieldset>
                        <table>
                            <tr>
                                <td></td>
                                <td>
                                    <button id="btnEnviar" type="submit">Enviar</button>
                                    <button id="btnBorrar" type="reset">Borrar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=TipoEquipo">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </article>
        </section>
    </body>
</html>