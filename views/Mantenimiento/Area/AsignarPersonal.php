<!-- File: /views/Mantenimiento/Area/AsignarPersonal.php -->

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/jquery.dataTables_themeroller.css"/>
      
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript" src="resources/js/template.funciones.js"></script>
        <script type="text/javascript" src="resources/js/template.lista.js"></script>
        <script type="text/javascript" src="resources/js/jquery.dataTables.min.js"></script>
            
        <script type="text/javascript">
            $(document).ready(function() {
                // INICIO Personal
                var idPersonalTags = new Array();
                var nombreCompletoTags = new Array();
                <?php
                    if($vwPersonales) { 
                        foreach ($vwPersonales as $vwPersonal) {
                ?>
                        idPersonalTags.push('<?php echo $vwPersonal->getIdPersonal(); ?>');
                        nombreCompletoTags.push('<?php echo $vwPersonal->getNombreCompleto(); ?>');
                <?php
                        }
                    }
                ?>
                        
                $("#txtIdPersonal").autocomplete({
                    source: 
                        function(request, response) {
                            var results = $.ui.autocomplete.filter(idPersonalTags, request.term);

                            response(results.slice(0, 10));
                        }
                });
                $("#txtPersonal").autocomplete({
                    source: 
                        function(request, response) {
                            var results = $.ui.autocomplete.filter(nombreCompletoTags, request.term);

                            response(results.slice(0, 10));
                        }
                });
                
                $("#txtIdPersonal").autocomplete({ autoFocus: true });
                $('#btnIdPersonal').button({
                    icons: {
                        primary: "ui-icon-search"
                    },
                    text: false
                });
                $('#btnIdPersonal').css('height', parseInt($("#txtIdPersonal").css('height')) + 8);
                $("#txtIdPersonal").css('width', parseInt($("#txtIdPersonal").css('width')) - 48);
                         
                var comprobarIdPersonal = function() {
                    var idPersonal = $('#txtIdPersonal').val();
                    var r = false;
                    <?php
                        if($vwPersonales) { 
                            foreach ($vwPersonales as $vwPersonal) {
                    ?>
                                if(idPersonal === '<?php echo $vwPersonal->getIdPersonal(); ?>') {
                                    $('#txtPersonal').val('<?php echo $vwPersonal->getNombreCompleto(); ?>');
                                    r = true;
                                }
                    <?php
                            }
                    ?>
                                if(!r)  $('#txtPersonal').val('');
                    <?php
                        }
                    ?>
                }; 
                
                $('#txtIdPersonal').keyup(comprobarIdPersonal);
                $('#txtIdPersonal').on( "autocompleteclose", comprobarIdPersonal);
          
                var comprobarNombreCompleto = function() {
                    var nombreCompleto = $('#txtPersonal').val();
                    var r = false;
                    <?php
                        if($vwPersonales) { 
                            foreach ($vwPersonales as $vwPersonal) {
                    ?>
                                if(nombreCompleto === '<?php echo $vwPersonal->getNombreCompleto(); ?>') {
                                    $('#txtIdPersonal').val('<?php echo $vwPersonal->getIdPersonal(); ?>');
                                    r = true;
                                }
                    <?php
                            }
                    ?>
                                if(!r)  $('#txtIdPersonal').val('');
                    <?php
                        }
                    ?>
                }; 
          
                $('#txtPersonal').keyup(comprobarNombreCompleto);
                $('#txtPersonal').on( "autocompleteclose", comprobarNombreCompleto);
        
                $( '#divPersonal' ).dialog({
                    autoOpen: false,
                    modal: true,
                    height: 400,
                    width: 1050,
                    show: {
                        effect: "blind",
                        duration: 1000
                    },
                    hide: {
                        effect: "explode",
                        duration: 1000
                    },
                    buttons: {
                        "Cancelar": function() {
                            $(this).dialog("close");
                        }
                    }
                });
                $('#btnIdPersonal').click(function() {
                    $('#divPersonal').dialog('open');
                });
                
                $("form").submit(function() {
                    if($("#txtIdPersonal").val() === "" || $("#txtPersonal").val() === "") {
                        alert("Seleccionar un Personal correctamente");
                        return false;
                    }
                });
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
                                <td><input id="txtPersonal" type="text"></td>
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
                    <!-- Dialog Modal para Personal -->
                    <div id="divPersonal" title="Elegir un Personal">
                        <table class="tblLista">
                            <thead>
                                <tr>            
                                    <th><abbr title="Código identificador">ID.</abbr> Personal</th>
                                    <th>Nombre Completo</th>
                                    <th>Correo</th>
                                    <th>RPM</th>
                                    <th>Anexo</th>
                                    <th></th>
                             </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(is_array($vwPersonales)) {
                                        foreach ($vwPersonales as $vwPersonal) {
                                ?>
                                <tr>
                                    <td><?php echo $vwPersonal->getIdPersonal(); ?></td>
                                    <td><?php echo $vwPersonal->getNombreCompleto(); ?></td>
                                    <td><?php echo $vwPersonal->getCorreo(); ?></td>
                                    <td><?php echo $vwPersonal->getRpm(); ?></td>
                                    <td><?php echo $vwPersonal->getAnexo(); ?></td>
                                    <td><button class="btnSeleccionarPersonal"></button></td>
                                </tr>
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                        <script type="text/javascript">
                            $('.btnSeleccionarPersonal').button({
                                icons: {
                                    primary: "ui-icon-check"
                                },
                                text: false
                            }).click(function() {
                                var idPersonal = $(this).parents('tr').find('td').eq(0).text();
                                setValue($('#txtIdPersonal'), idPersonal);
                                //comprobarPersonal();
                                var idPersonal = $('#txtIdPersonal').val();
                                var r = false;
                                <?php
                                    if($vwPersonales) { 
                                        foreach ($vwPersonales as $vwPersonal) {
                                ?>
                                            if(idPersonal === '<?php echo $vwPersonal->getIdPersonal(); ?>') {
                                                $('#txtPersonal').val('<?php echo $vwPersonal->getNombreCompleto(); ?>');
                                                r = true;
                                            }
                                <?php
                                        }
                                ?>
                                            if(!r)  $('#txtPersonal').val('');
                                <?php
                                    }
                                ?>
                                $('#divPersonal').dialog('close');
                            });
                        </script>
                    </div>
                </form>
            </article>
        </section>
    </body>
</html>