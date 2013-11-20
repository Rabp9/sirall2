<?php
    interface AppDAO {
        function getAll();
        function crear($object);
        function editar($object);
        function eliminar($object);
        function getBy($campo, $valor);
}