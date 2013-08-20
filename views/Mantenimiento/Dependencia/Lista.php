<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.js"></script>
        <script type="text/javascript" src="resources/js/funciones.js"></script>
       
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.css"/>

        <title>Titulo</title>
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
                            if(isset($result)) {
                                while ($row = $result->fetch()) {
                        ?>
                        <tr>
                            <td><?php echo $row['idMarca']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td><?php echo $row['indicacion']; ?></td>
                            <td>
                                <a href="Views/Marca/?controller=Marca&accion=Detalle&idMarca=<?php echo $row['idMarca']; ?>"><img src="resources/images/detalle.png"></a> |
                                <a href="Views/Marca/?controller=Marca&accion=Editar&idMarca=<?php echo $row['idMarca']; ?>"><img src="resources/images/editar.png"></a> |
                                <a href="Views/Marca/?controller=Marca&accion=Eliminar&idMarca=<?php echo $row['idMarca']; ?>"><img src="resources/images/eliminar.png"></a>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                    <tfoot>          
                        <tr>
                            <td colspan="2"><a href="?controller=Dependencia&action=Crear">Crear Dependencia</a></td>
                        </tr>
                    </tfoot>
                </table>
            </article>
        </section>
    </body>
</html>