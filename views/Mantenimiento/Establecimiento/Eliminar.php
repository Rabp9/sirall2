<!-- File: /views/Mantenimiento/Establecimiento/Eliminar.php -->

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
        <script type="text/javascript" src="resources/js/template.eliminar.js"></script>
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
        
        <title>SIRALL2 - Eliminar Establecimiento</title>
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
                        <h2>Eliminar Establecimiento</h2>
                        <h4>¿Está seguro de eliminar la Establecimiento?</h4>
                    </hgroup>
                </header>
                <form id="frmEliminarEstablecimiento" method="POST" action="?controller=Establecimiento&action=EliminarPOST">
                     <fieldset>
                        <legend>Eliminar Establecimiento</legend>
                        <input id="idEstablecimiento" type="hidden" value="<?php echo $vwEstablecimiento->getIdEstablecimiento(); ?>" name="idEstablecimiento"/>
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
                                <td></td>
                                <td>
                                    <button id="enviar" type="button" value="" name="enviar">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="?controller=Establecimiento">Regresar</a></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <!-- Ventana de diálogo confirmar -->
                <div id="confirmar" title="Advertencia">
                    <p>¿Está seguro de eliminar la Establecimiento?</p>
                </div>
            </article>
        </section>
    </body>
</html>