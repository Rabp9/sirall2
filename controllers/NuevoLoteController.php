<?php
    require_once '/DAO/MarcaDAO.php';
    require_once '/DAO/ModeloDAO.php';
    
    class NuevoLoteController {
        public static function NuevoLoteAction() {
            $marcas = MarcaDAO::getAllMarca();
            require_once '/views/Nuevo Lote/Index.php';
        }
        
        public static function getModelobyIdMarcaAction() {
            if(isset($_GET['idMarca'])) {
                $modelos = ModeloDAO::getModeloByIdMarca($_GET['idMarca']);
                echo self::modelosToXML($modelos);
            }
        }
        
        private static function modelosToXML($modelos) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>';
            $xml .= "\n<Modelos>\n";
            if(is_array($modelos))
                foreach($modelos as $modelo)
                    $xml .= $modelo->toXML() . "\n";
            $xml .= "</Modelos>\n";
            return $xml;
        }
    }
?>
