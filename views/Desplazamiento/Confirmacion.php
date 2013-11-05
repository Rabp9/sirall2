<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
            
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#btnRealizarDesplazamiento').button().focus().click(function() {
                    window.location = "?controller=Desplazamiento";
                });
            });
        </script>
        <title>SIRALL2 - Desplazamiento de Equipo</title>
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
                        <h2>Confirmación - Desplazamiento de Equipo</h2>
                        <h4>Confirmación de Desplazamiento de Equipo</h4>
                    </hgroup>
                </header>
                <fieldset>
                    <legend>Información de Desplazamiento</legend>
                    <table>
                        <tr>
                            <td><strong>Código Patrimonial:</strong></td>
                            <td><?php echo $equipo->getCodigoPatrimonial(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Serie:</strong></td>
                            <td><?php echo $equipo->getSerie(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Modelo:</strong></td>
                            <td><?php echo $modelo->getDescripcion(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Marca:</strong></td>
                            <td><?php echo $marca->getDescripcion(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Tipo de Equipo:</strong></td>
                            <td><?php echo $tipoEquipo->getDescripcion(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Indicacion:</strong></td>
                            <td><?php echo $equipo->getIndicacion(); ?></td>  
                        </tr>
                        <tr>
                            <td><strong>Origen:</strong></td>
                            <td>
                                <?php echo $usuarioOrigen->getApellidoPaterno() . ' ' . $usuarioOrigen->getApellidoMaterno() . ', ' . $usuarioOrigen->getNombres(); ?><br/>
                                <?php echo $dependenciaOrigen->getDescripcion(); ?><br/>
                                <?php echo $redOrigen->getDescripcion(); ?>
                             </td>  
                        </tr>
                        <tr>
                            <td><strong>Destino:</strong></td>
                            <td>
                                <?php echo $usuarioDestino->getApellidoPaterno() . ' ' . $usuarioDestino->getApellidoMaterno() . ', ' . $usuarioDestino->getNombres(); ?><br/>
                                <?php echo $dependenciaDestino->getDescripcion(); ?><br/>
                                <?php echo $redDestino->getDescripcion(); ?>
                             </td>  
                        </tr>
                        <tr>
                            <td><strong>Fecha:</strong></td>
                            <td>
                                <?php
                                    $fecha = new DateTime();
                                    $fecha->createFromFormat('Y-m-d', $desplazamiento->getFecha());
                                    echo $fecha->format('d-m-Y'); 
                                ?>
                            </td>  
                        </tr>
                        <tr>
                            <td><strong>Observación:</strong></td>
                            <td><?php echo $desplazamiento->getObservacion(); ?></td>  
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button id="btnRealizarDesplazamiento" type="button">Realizar Desplazamiento</button>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </article>
        </section>
    </body>
</html>