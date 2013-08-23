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
                        <h2>Registrar Usuario</h2>
                        <h4>Realiza el registro de un Usuario</h4>
                    </hgroup>
                </header>
                    <fieldset>
                        <legend>Información Personal</legend>
                        <table>
                            <tr>
                                <td>Código Usuario:</td>
                                <td><?php echo 1; ?></td>
                            </tr>
                            <tr>
                                <td>Dependencia:</td>
                                <td><?php echo 4; ?></td>
                            </tr>
                            <tr>
                                <td>Usuario:</td>
                                <td><?php echo $usuario->getApellidoPaterno() . ' ' . $usuario->getApellidoMaterno() . ', ' . $usuario->getNombres();?></td>  
                            </tr>
                            <tr>
                                <td>e-mail:</td>
                                <td><?php echo $usuario->getEmail(); ?></td>  
                            </tr>
                            <tr>
                                <td>RPM:</td>
                                <td><?php echo $usuario->getRpm(); ?></td>  
                            </tr>
                            <tr>
                                <td>Anexo:</td>
                                <td><?php echo $usuario->getAnexo(); ?></td>  
                            </tr>
                        </table>
                        Con el siguiente link podrá crear el nombre de usuario y contraseña de este usuario:
                        <a href="#">link</a>
                    </fieldset>       
            </article>
        </section>
    </body>
</html>