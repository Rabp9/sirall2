<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.js"></script>
        <script type="text/javascript" src="resources/js/funciones.js"></script>
       
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
            
        <script type="text/javascript">
            $(document).ready(function() {
                isRequired($('#txtNombres'));
                isRequired($('#txtApellidoPaterno'));
                isRequired($('#txtApellidoMaterno'));
                setValue($('#txtIdUsuario'), <?php echo $nextID; ?>);
                isReadOnly($('#txtIdUsuario'));
                /* $('#cboDependencia').change(function() {
                    var jqxhr = $.ajax({
                        url: 'Index.php',
                        type: 'GET',
                        data: {
                            controller: 'RegistrarUsuario',
                            accion: 'getXMLDependencias',
                            idDependencia: $('#cboDependencia').val()
                        },
                        success: function(data) {
                            alert(data);
                            $(data).find('Dependencia').each(function() {
                                alert($(this).find('descripcion').text());
                            });
                        }
                    })
                });
        */
                /*var jqxhr = $.ajax({
                    url: 'Index.php',
                    type: 'GET',
                    data: {
                        controller: 'RegistrarUsuario',
                        accion: 'getXMLDependencias'
                    },
                    success: function(data) {
                        alert(data);
                        $(data).find('Dependencia').each(function() {
                            alert($(this).find('descripcion').text());
                        });
                    }
                })
                .done(function() { alert("success"); })
                .fail(function() { alert("error"); })
                .always(function() { alert("complete"); });

                // perform other work here ...

                // Set another completion function for the request above
                jqxhr.always(function() { alert("second complete"); });
*/
            });
        </script>
        <title>Titulo</title>
    </head>
    <body>
        <aside>
            <header>
                <a id="aInicio" href="/SIRALL2/">
                    <figure>
                        <img id="imgLogo" src="">
                        <h1>CABECERA</h1>
                    </figure>
                </a>
            </header>
            <nav>
                <?php include_once 'views/Home/nav.php';?>
            </nav>
        </aside>
        <section>
            <article>
                <header>
                    <hgroup>
                        <h2>Crear Dependencia</h2>
                        <h4>Crea una Dependencia</h4>
                    </hgroup>
                </header>
                <form id="frmCrearDependencia" method="POST" action="?controller=RegistrarUsuario&action=CrearUsuario">
                    <fieldset>
                        <legend>Crear Dependencia</legend>
                        <table>
                            <tr>
                                <td><label for="txtIdDependencia"><abbr title="Código identificador">ID.</abbr> Dependencia</label></td>
                                <td><input id="txtIdDependencia" type="text" name="dependencia"></td>
                            </tr>
                            <tr>
                                <td><label for="txtDescripcion">Descripcion</label></td>
                                <td><input id="txtDescripcion" type="text" name="descripcion" placeholder="Escribe una descripción"></td>  
                            </tr>
                            <tr>
                                <td><label for="cboDependenciaSuperior">Dependencia Superior</label></td>
                                <td>
                                    <select id="cboDependencia" name="superIdDependencia">
                                        <optgroup>
                                            <option>Selecciona una Dependencia</option>
                                        </optgroup>
                                        <optgroup>
                                            <?php 
                                                if(isset($dependencias)) { 
                                                    foreach ($dependencias as $dependencia) {
                                                        echo "<option value='" . $dependencia->getIdDependencia() . "'>" . $dependencia->getDescripcion() . "</option>";
                                                    }
                                                }
                                            ?>
                                        </optgroup>
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
                        </table>
                    </fieldset>               
                </form>
            </article>
        </section>
    </body>
</html>