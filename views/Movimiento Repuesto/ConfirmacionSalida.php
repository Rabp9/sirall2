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
                $('#btnSalida').button().focus().click(function() {
                    window.location = "?controller=MovimientoRepuesto&action=Salida";
                });
            });
        </script>
        
        <title>SIRALL2 - Salida de Repuestos</title>
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
                        <h2>Confirmación - Salida de Repuestos</h2>
                        <h4>Confirmación de salida de Repuestos</h4>
                    </hgroup>
                </header>
                <fieldset>
                    <legend>Salida de Repuestos</legend>
                    <table>
                        <tr>
                            <td><strong><abbr title="Código identificador">ID.</abbr> Repuesto:</strong></td>
                            <td><?php echo $repuesto->getIdRepuesto(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Repuesto:</strong></td>
                            <td><?php echo $repuesto->getDescripcion(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Cantidad:</strong></td>
                            <td><?php echo $salidaRepuesto->getCantidad() . " " . $repuesto->getUnidadMedida(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Fecha:</strong></td>
                            <td>
                                <?php
                                    $fecha = new DateTime();
                                    $fecha->createFromFormat('Y-m-d', $salidaRepuesto->getFecha());
                                    echo $fecha->format('d-m-Y'); 
                                ?>
                            </td>  
                        </tr>
                        <tr>
                            <td><strong>Observación:</strong></td>
                            <td><?php echo $salidaRepuesto->getObservacion(); ?></td>  
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button id="btnSalida" type="button">Salida de Repuestos</button>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </article>
        </section>
    </body>
</html>