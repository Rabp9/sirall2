<!-- File: /views/Mantenimiento/Establecimiento/Detalle.php -->

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
      
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript" src="resources/js/jquery.codaPopupBubbles.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.ajax({
                    url: 'resources/xml/LaLibertad.xml',
                    success: function(data) {
                        var codigoProvincia = "<?php echo $vwEstablecimiento->getProvincia(); ?>";
                        var codigoDistrito = "<?php echo $vwEstablecimiento->getDistrito(); ?>";
                        
                        var provincia = $(data).find("Provincia[codigo=" + codigoProvincia + "]").attr("nombre");
                        var distrito = $(data).find("Distrito[codigo=" + codigoDistrito + "]").text();
                        
                        $("td.Provincia").text(provincia);
                        $("td.Distrito").text(distrito);
                    }
                });
            });
        </script>
        
        <title>SIRALL2 - Detalle Establecimiento</title>
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
                        <h2>Detalle Establecimiento</h2>
                        <h4>Detalla la información de la Establecimiento</h4>
                    </hgroup>
                </header>
                <fieldset>
                    <legend>Detalle Establecimiento</legend>
                    <table>
                        <tr>
                            <td><strong><abbr title="Código identificador">ID.</abbr> Establecimiento:</strong></td>
                            <td><?php echo $vwEstablecimiento->getIdEstablecimiento(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Descripción:</strong></td>
                            <td><?php echo $vwEstablecimiento->getDescripcion(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Dirección:</strong></td>
                            <td><?php echo $vwEstablecimiento->getDireccion(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Nivel:</strong></td>
                            <td><?php echo $vwEstablecimiento->getNivel(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Tipo CAS:</strong></td>
                            <td><?php echo $vwEstablecimiento->getTipoCAS(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Situación:</strong></td>
                            <td><?php echo $vwEstablecimiento->getSituacion(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Provincia:</strong></td>
                            <td class="Provincia"><?php echo $vwEstablecimiento->getProvincia(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Distrito:</strong></td>
                            <td class="Distrito"><?php echo $vwEstablecimiento->getDistrito(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Teléfono:</strong></td>
                            <td><?php echo $vwEstablecimiento->getTelefono(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>RPM:</strong></td>
                            <td><?php echo $vwEstablecimiento->getRpm(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Número de Áreas:</strong></td>
                            <td><?php echo $vwEstablecimiento->getNumArea(); ?></td>  
                        </tr>
                        <tr>
                            <td>
                                <a class="aEditar" href="?controller=Establecimiento&action=Editar&idEstablecimiento=<?php echo $vwEstablecimiento->getIdEstablecimiento(); ?>">Editar</a> |
                                <a class="aEliminar" href="?controller=Establecimiento&action=Eliminar&idEstablecimiento=<?php echo $vwEstablecimiento->getIdEstablecimiento(); ?>">Eliminar</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="?controller=Establecimiento">Regresar</a></td>
                        </tr>
                    </table>
                </fieldset>
            </article>
        </section>
    </body>
</html>