<!-- File: /DAO/AppDAO.php -->

<?php
    interface AppDAO {
        /*
         * Devuelve todos los registros de la entidad
         */
        static function getAll();
        /*
         * Devuelve una entidad buscado por un campo determinado
         */
        static function getBy($campo, $valor);
        /*
         * Registra una nueva entidad
         */
        static function crear($object);
        /*
         * Actualiza una entidad
         */
        static function editar($object);
        /*
         * Establece como desactivado una entidad
         */
        static function eliminar($object);
}