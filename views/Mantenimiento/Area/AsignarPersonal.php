<!-- File: /views/Mantenimiento/Area/AsignarPersonal.php -->

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
                $('#btnIdPersonal').button({
                    icons: {
                        primary: "ui-icon-search"
                    },
                    text: false
                });
                $('#btnIdPersonal').css('height', parseInt($("#txtIdPersonal").css('height')) + 8);
                $("#txtIdPersonal").css('width', parseInt($("#txtIdPersonal").css('width')) - 48);
                 
            });
        </script>
        
        <title>SIRALL2 - Asignar Personal</title>
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
                        <h2>Asignar Personal</h2>
                        <h4>Asignar Personal a Área</h4>
                    </hgroup>
                </header>
                <form id="frmAsignarPersonal" method="POST" action="?controller=Area&action=AsignarPersonalPOST">
                    <fieldset>
                        <legend>Asignar Área</legend>
                        <table>
                            <tr>
                                <td><strong><abbr title="Código identificador">ID.</abbr> Área:</strong></td>
                                <td><?php echo $vwArea->getIdArea(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Descripción:</strong></td>
                                <td><?php echo $vwArea->getDescripcion(); ?></td>  
                            </tr>
                            <tr>
                                <td><strong>Establecimiento:</strong></td>
                                <td><?php echo $vwArea->getEstablecimiento(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Jefatura Inmediata:</strong></td>
                                <td><?php echo $vwArea->getJefaturaInmediata(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Área General:</strong></td>
                                <td><?php echo $vwArea->getAreaGeneral(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Cód. Personal:</strong></td>
                                <td>    
                                    <input id="txtIdPersonal" type="text" name="idPersonal">
                                    <button type="button" id="btnIdPersonal"></button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Nombre Completo:</strong></td>
                                <td></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </article>
        </section>
    </body>
</html>