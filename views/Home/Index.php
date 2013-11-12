<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
              
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.home.css"/>
        
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $( ".sortable" ).sortable();
                $( ".sortable" ).disableSelection();   
                $( "#tabsOpciones" ).tabs({
                    event: "mouseover"
                });
                $("#sortableMantenimiento a").button().removeClass('ui-state-default').addClass('ui-widget-content');
            });
        </script>
        
        <title>SIRALL2</title>
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
                        <h2>Bienvenidos</h2>
                        <h4>Bienvenidos al sistema de Administración de SIRALL</h4>
                    </hgroup>
                </header>
                <div class="ui-widget-content ui-corner-all">
                    <div id="tabsOpciones">
                        <ul>
                            <li><a href="#mantenimiento">Mantenimiento</a></li>
                            <li><a href="#transaccion">Transacciones</a></li>
                            <li><a href="#reporte">Reportes</a></li>
                        </ul>
                        <div id="mantenimiento">
                            <ul class="sortable">
                                <li><a href="?controller=Red"><img src="resources/images/red - grande.png"/><br/>Red</a></li>
                                <li><a href="?controller=Dependencia"><img src="resources/images/dependencia - grande.png"/><br/>Dependencia</a></li>
                                <li><a href="?controller=Equipo"><img src="resources/images/red - grande.png"/><br/>Equipo</a></li>
                                <li><a href="?controller=Repuesto"><img src="resources/images/red - grande.png"/><br/>Repuesto</a></li>
                                <li><a href="?controller=Rol"><img src="resources/images/red - grande.png"/><br/>Rol</a></li>
                                <li><a href="?controller=Usuario"><img src="resources/images/red - grande.png"/><br/>Usuario</a></li>
                                <li><a href="?controller=Marca"><img src="resources/images/red - grande.png"/><br/>Marca</a></li>
                                <li><a href="?controller=Modelo"><img src="resources/images/red - grande.png"/><br/>Modelo</a></li>
                                <li><a href="?controller=TipoEquipo"><img src="resources/images/red - grande.png"/><br/>Tipo de Equipo</a></li>
                            </ul>   
                        </div>
                        <div id="transaccion">
                            <ul class="sortable">
                                <li><a href="?controller=NuevoLote"><span class="ui-icon ui-icon-plus"></span>Nuevo Lote</a></li>
                                <li><a href="?controller=AsignarJefeDependencia"><span class="ui-icon ui-icon-transferthick-e-w"></span>Asignar Jefe de Dependencia</a></li>
                                <li><a href="?controller=RegistrarUsuario"><span class="ui-icon ui-icon-person"></span>Registrar Usuario</a></li>
                                <li><a href="?controller=MovimientoRepuesto&action=Ingreso"><span class="ui-icon ui-icon-plus"></span>Ingreso de Repuestos</a></li>
                                <li><a href="?controller=MovimientoRepuesto&action=Salida"><span class="ui-icon ui-icon-minus"></span>Salida de Repuestos</a></li>
                                <li><a href="?controller=Desplazamiento"><span class="ui-icon ui-icon-arrowreturnthick-1-e"></span>Desplazamiento</a></li>
                                <li><a href="?controller=RealizarMantenimiento"><span class="ui-icon ui-icon-circle-plus"></span>Realizar Mantenimiento</a></li>
                           </ul>   
                        </div>
                        <div id="reporte">
                            <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                            <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </body>
</html>