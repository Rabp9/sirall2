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
                $(".sortable a").button().removeClass('ui-state-default').addClass('ui-widget-content');
                
                $( "#mensaje" ).dialog({
                    closeOnEscape: true,
                    show: 'fade',
                    hide: 'fade',
                    open: function(event, ui){
                        setTimeout("$('#mensaje').dialog('close')",3000);
                    },
                    position: { 
                        at: "right top", 
                        of: window
                    },
                    buttons: [
                        {
                            text: "OK",
                            click: function() {
                                $( this ).dialog( "close" );
                            }
                        }
                    ]
                });
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
                <?php if(isset($mensaje)) { ?>
                <div id="mensaje" title="Mensaje"><p><?php echo $mensaje; ?></p></div>
                <?php } ?>
                <div class="ui-widget-content ui-corner-all">
                    <div id="tabsOpciones">
                        <ul>
                            <li><a href="#mantenimiento"><h3>Mantenimiento</h3></a></li>
                            <li><a href="#transaccion"><h3>Transacciones</h3></a></li>
                            <li><a href="#reporte"><h3>Reportes</h3></a></li>
                        </ul>
                        <div id="mantenimiento">
                            <ul class="sortable">
                                <li><a href="?controller=Red"><img src="resources/images/red - grande.png"/><br/>Red</a></li>
                                <li><a href="?controller=Dependencia"><img src="resources/images/dependencia - grande.png"/><br/>Dependencia</a></li>
                                <li><a href="?controller=Equipo"><img src="resources/images/equipo - grande.png"/><br/>Equipo</a></li>
                                <li><a href="?controller=Repuesto"><img src="resources/images/repuesto - grande.png"/><br/>Repuesto</a></li>
                                <li><a href="?controller=Rol"><img src="resources/images/rol - grande.png"/><br/>Rol</a></li>
                                <li><a href="?controller=Usuario"><img src="resources/images/usuario - grande.png"/><br/>Usuario</a></li>
                                <li><a href="?controller=Marca"><img src="resources/images/marca - grande.png"/><br/>Marca</a></li>
                                <li><a href="?controller=Modelo"><img src="resources/images/modelo - grande.png"/><br/>Modelo</a></li>
                                <li><a href="?controller=TipoEquipo"><img src="resources/images/tipo de Equipo - grande.png"/><br/>Tipo de Equipo</a></li>
                            </ul>   
                        </div>
                        <div id="transaccion">
                            <ul class="sortable">
                                <li><a href="?controller=NuevoLote"><img src="resources/images/plus - grande.png"/><br/>Nuevo Lote</a></li>
                                <li><a href="?controller=AsignarJefeDependencia"><img src="resources/images/asignar Jefe - grande.png"/><br/>Asignar Jefe</a></li>
                                <li><a href="?controller=RegistrarUsuario"><img src="resources/images/usuario - grande.png"/><br/>Registrar Usuario</a></li>
                                <li><a href="?controller=MovimientoRepuesto&action=Ingreso"><img src="resources/images/plus - grande.png"/><br/>Ingreso de Repuestos</a></li>
                                <li><a href="?controller=MovimientoRepuesto&action=Salida"><img src="resources/images/minus - grande.png"/><br/>Salida de Repuestos</a></li>
                                <li><a href="?controller=Desplazamiento"><img src="resources/images/desplazamiento - grande.png"/><br/>Desplazar</a></li>
                                <li><a href="?controller=RealizarMantenimiento"><img src="resources/images/mantenimiento - grande.png"/><br/>Realizar Mantenimiento</a></li>
                           </ul>   
                        </div>
                        <div id="reporte">
                            <ul class="sortable">
                                <li><a href="?controller=Reporte&action=ReporteMarcas"><img src="resources/images/marca - grande.png"/><br/>Marca</a></li>
                                <li><a href="?controller=Reporte&action=ReporteTipoEquipos"><img src="resources/images/tipo de Equipo - grande.png"/><br/>Tipo de Equipo</a></li>
                                <li><a href="?controller=Reporte&action=ReporteModelos"><img src="resources/images/modelo - grande.png"/><br/>Modelo</a></li>
                                <li><a href="?controller=Reporte&action=ReporteEquipos"><img src="resources/images/equipo - grande.png"/><br/>Equipo</a></li>
                                <li><a href="?controller=Reporte&action=ReporteRepuestos"><img src="resources/images/repuesto - grande.png"/><br/>Repuesto</a></li>
                                <li><a href="?controller=Reporte&action=ReporteUsuarios"><img src="resources/images/usuario - grande.png"/><br/>Usuario</a></li>
                                <li><a href="?controller=Usuario"><img src="resources/images/desplazamiento - grande.png"/><br/>Desplazar</a></li>
                                <li><a href="?controller=Usuario"><img src="resources/images/mantenimiento - grande.png"/><br/>Mantenimiento</a></li>
                            </ul>   
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </body>
</html>