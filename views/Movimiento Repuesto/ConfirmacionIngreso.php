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
                $('#btnIngreso').button().focus().click(function() {
                    window.location = "?controller=MovimientoRepuesto&action=Ingreso";
                });
            });
        </script>
        
        <title>SIRALL2 - Ingreso de Repuestos</title>
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
                        <h2>Confirmación - Ingreso de Repuestos</h2>
                        <h4>Confirmación de ingreso de Repuestos</h4>
                    </hgroup>
                </header>
                <fieldset>
                    <legend>Ingreso de Repuestos</legend>
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
                            <td><?php echo $ingresoRepuesto->getCantidad() . " " . $repuesto->getUnidadMedida(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Fecha:</strong></td>
                            <td><?php echo $ingresoRepuesto->getFecha(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Observación:</strong></td>
                            <td><?php echo $ingresoRepuesto->getObservacion(); ?></td>  
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button id="btnIngreso" type="button">Ingreso de Repuestos</button>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </article>
        </section>
    </body>
</html>