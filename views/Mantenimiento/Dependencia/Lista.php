<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.js"></script>
        <script type="text/javascript" src="resources/js/funciones.js"></script>
        <script type="text/javascript" src="resources/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.tblLista').dataTable( {
                    "sPaginationType": "full_numbers",
                    "sScrollY": "600px",
                    "bJQueryUI": true,
                    "bScrollCollapse": true,        
                    "oLanguage": {
                        "sLengthMenu": "Mostrar _MENU_ registros por página",
                        "sZeroRecords": "No se ecnontró ningún registro",
                        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ ",
                        "sInfoEmpty": "No se muestra ningún registro",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "oPaginate": {
                            "sFirst": "|<",
                            "sLast": ">|",
                            "sNext": ">>",
                            "sPrevious": "<<",
                        },
                        "sSearch": "Buscar"
                    }
                });
            });
            
        </script>
        
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/jquery.dataTables_themeroller.css"/>
        
        <title>SIRALL2 - Lista Dependencia</title>
    </head>
    <body>
        <aside>
            <header>
                <a id="aInicio" href="/SIRALL2/">
                    <figure>
                        <img id="imgLogo" src="">
                        <h1>CABECERA</h1>
                    </figure>
                </a>
            </header>
            <nav>
                <?php include_once 'views/Home/nav.php';?>
            </nav>
        </aside>
        <section>
            <article>
                <header>
                    <hgroup>
                        <h2>Lista Dependencia</h2>
                        <h4>Lista de Dependencias registradas</h4>
                    </hgroup>
                </header>
                <table class="tblLista">
                    <thead>
                        <tr>
                            <th><abbr title="Código identificador">ID.</abbr> Dependencia</th>
                            <th>Descripción</th>
                            <th>Dependencia Superior</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($dependencias)) {
                                while ($dependencia = $dependencias->fetch()) {
                        ?>
                        <tr>
                            <td><?php echo $dependencia['idDependencia']; ?></td>
                            <td><?php echo $dependencia['descripcion']; ?></td>
                            <td><?php echo $dependencia['superDependencia']; ?></td>
                            <td>
                                <a href="?controller=Dependencia&action=Detalle&idDependencia=<?php echo $dependencia['idDependencia']; ?>"><img src="resources/images/detalle.png"></a> |
                                <a href="?controller=Dependencia&action=Editar&idDependencia=<?php echo $dependencia['idDependencia']; ?>"><img src="resources/images/editar.png"></a> |
                                <a href="Views/Marca/?controller=Marca&accion=Eliminar&idMarca=<?php echo $dependencia['idDependencia']; ?>"><img src="resources/images/eliminar.png"></a>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                    <tfoot>          
                        <tr>
                            <td colspan="2"><a class="crearLink" href="?controller=Dependencia&action=Crear">Crear Dependencia</a></td>
                        </tr>
                    </tfoot>
                </table>
            </article>
        </section>
    </body>
</html>