<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/jquery.dataTables_themeroller.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/jquery.treeview.css"/>
       
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript" src="resources/js/template.lista.js"></script>
        <script type="text/javascript" src="resources/js/template.dependenciaSelect.js"></script>
        <script type="text/javascript" src="resources/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="resources/js/jquery.treeview.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.aRealizarMantenimiento').button({
                    icons: {
                        primary: "ui-icon-document"
                    },
                    text: false
                });
                $('.aRealizarMantenimiento').css('height', 30);
            });
        </script>
        
        <title>SIRALL2 - Realizar Mantenimiento de Equipo</title>
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
                        <h2>Realizar Mantenimiento de Equipo</h2>
                        <h4>Registra el mantenimiento de un Equipo</h4>
                    </hgroup>
                </header>
                <!--
                <fieldset>
                    <legend>Opciones de Filtrado</legend>
                    <table>
                        <tr>
                            <td><label for="btnDependenciaSuperior">Dependencia Superior</label></td>
                            <td>
                                <button id="btnDependenciaSuperior" type="button">Seleccionar</button>
                                <span id="txtDependenciaSeleccionada"></span>
                                <input id="hdnEstablecimiento" type="hidden" name="idEstablecimiento" value=""/>
                                <input id="hdnDependencia" type="hidden" name="idDependencia" value=""/>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                -->
                <table class="tblLista">
                    <thead>
                        <tr>
                            <th>Código Patrimonial</th>
                            <th>Serie</th>
                            <th>Tipo de Equipo</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Dependencia</th>
                            <th>Último Mantenimiento</th>
                            <th>N° mantenimientos</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($equipos)) {
                                while ($equipo = $equipos->fetch()) {
                        ?>
                        <tr>
                            <td><?php echo $equipo['codigoPatrimonial']; ?></td>
                            <td><?php echo $equipo['serie']; ?></td>
                            <td><?php echo $equipo['tipoEquipo']; ?></td>
                            <td><?php echo $equipo['marca']; ?></td>
                            <td><?php echo $equipo['modelo']; ?></td>
                            <td><?php echo $equipo['dependencia']; ?></td>
                            <td><?php echo $equipo['fechaUltimo']; ?></td>
                            <td><?php echo $equipo['numeroMan']; ?></td>
                            <td><a class="aRealizarMantenimiento" href="?controller=RealizarMantenimiento&action=InformeMantenimiento&codigoPatrimonial=<?php echo $equipo['codigoPatrimonial']; ?>"></a></td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <div id="dependenciaSelect" title="Seleccionar Dependencia">         
                    <p>Selecciona una Dependencia</p>
                    <?php
                        function tieneHijos($padre, $dependencias) {
                            foreach ($dependencias as $dependencia) {
                                if($padre->getIdDependencia() == $dependencia->getSuperIdDependencia()) 
                                    return true;
                            }
                            return false;
                        }

                        function mostrarHijosEstablecimiento($padre, $dependencias) {
                            if(is_array($dependencias)) {
                                foreach ($dependencias as $dependencia) {
                                    if($padre->getIdEstablecimiento() == $dependencia->getIdEstablecimiento() && $dependencia->getSuperIdDependencia() == null) {
                                        echo "<li><button type='button' title='Dependencia'><input type='hidden' value='" . $dependencia->getIdDependencia() ."'/>" . $dependencia->getDescripcion() . "</button>";
                                        if(tieneHijos($dependencia, $dependencias)) {
                                            echo "<ul>";
                                            mostrarHijos($dependencia, $dependencias);
                                            echo "</ul>";
                                        }
                                        echo "</li>";
                                    }
                                }
                            }
                        }

                        function mostrarHijos($padre, $dependencias) {
                            foreach ($dependencias as $dependencia) {
                                if($padre->getIdDependencia() == $dependencia->getSuperIdDependencia()) {
                                    echo "<li><button type='button' title='Dependencia'><input type='hidden' value='" . $dependencia->getIdDependencia() ."'/>" . $dependencia->getDescripcion() . "</button>";
                                    if(tieneHijos($dependencia, $dependencias)) {
                                        echo "<ul>";
                                        mostrarHijos($dependencia, $dependencias);
                                        echo "</ul>";
                                    }
                                    echo "</li>";
                                }
                            }
                        }

                        if(is_array($establecimientos)) {
                            echo "<ul id='ulDependencia' class='treeview-blue'>";
                            foreach($establecimientos as $establecimiento) {
                                echo "<li><button type='button' title='Establecimiento'><input type='hidden' value='" . $establecimiento->getIdEstablecimiento() ."'/>" . $establecimiento->getDescripcion() . "</button>";
                                echo "<ul>";
                                mostrarHijosEstablecimiento($establecimiento, $dependencias);
                                echo "</ul>";
                                echo "</li>";
                            }
                            echo "</ul>";
                        }
                    ?>
                    <button id="btnSeleccionar" type="button">Seleccionar</button>
                </div>
            </article>
        </section>
    </body>
</html>