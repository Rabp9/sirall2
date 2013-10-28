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
                $('#btnNuevoLote').button().focus().click(function() {
                    window.location = "?controller=NuevoLote";
                });
            });
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
                        <h2>Confirmación - Nuevo Lote</h2>
                        <h4>Confirmación de registro de un nuevo Lote de equipos</h4>
                    </hgroup>
                </header>
                <fieldset>
                    <legend>Detalles</legend>
                    <table>
                        <tr>
                            <td><strong>Marca:</strong></td>
                            <td><?php echo $marca->getDescripcion(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Tipo de Equipo:</strong></td>
                            <td><?php echo $tipoEquipo->getDescripcion(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Modelo:</strong></td>
                            <td><?php echo $modelo->getDescripcion(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>N° de Equipos:</strong></td>
                            <td><?php echo $n_equipos; ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Indicacion:</strong></td>
                            <td><?php echo $indicacion; ?></td>  
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button id="btnNuevoLote" type="button">Nuevo Lote</button>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </article>
        </section>
    </body>
</html>