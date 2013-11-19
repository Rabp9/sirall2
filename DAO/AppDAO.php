<?php
    interface appDAO {
        function getAll();
        function crear($object);
        function editar($object);
        function eliminar($object);
        function getBy($campo, $valor);
        function getBy($campos = array(), $valores = array());
}