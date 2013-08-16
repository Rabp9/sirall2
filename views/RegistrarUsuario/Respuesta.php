<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Titulo</title>
    </head>
    <body>
        aaaaaaaaaaaaaaaaaaa
        <br/>
        <?php 
            echo $usuario->getNombres() . "\n";
            echo $usuario->getApellidoPaterno() . "\n";
            echo $usuario->getApellidoMaterno() . "\n";
            var_dump($usuario);
        ?>
    </body>
</html>