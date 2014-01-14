<!-- File: /models/Dato.php -->

<?php    
    require_once './models/AppModel.php';
    /*
     * Clase Dato de Equipo
     */
    class Dato implements AppModel {
        private $idDato;
        private $codigoPatrimonial;
        private $serie;
        private $idOpcion;
        private $clave;
        private $valor;
        
        public function __construct($idDato = 0, $codigoPatrimonial = "", $serie = "", $idOpcion = "", $clave = "", $valor = "") {
            $this->idDato = $idDato;
            $this->codigoPatrimonial = $codigoPatrimonial;
            $this->serie = $serie;
            $this->idOpcion = $idOpcion;
            $this->clave = $clave;
            $this->valor = $valor;
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
        
        public function setIdDato($idDato) {
            $this->idDato = $idDato;
        }
               
        public function getIdDato() {
            return $this->idDato;
        }
        
        public function setCodigoPatrimonial($codigoPatrimonial) {
            $this->codigoPatrimonial = $codigoPatrimonial;
        }     
        
        public function getCodigoPatrimonial() {
            return $this->codigoPatrimonial;
        }
        
        public function setSerie($serie) {
            $this->serie = $serie;
        }
          
        public function getSerie() {
            return $this->serie;
        }
        
        public function setClave($clave) {
            $this->clave = $clave;
        }

        public function getClave() {
            return $this->clave;
        }
        
        public function setValor($valor) {
            $this->valor = $valor;
        }
 
        public function getValor() {
            return $this->valor;
        }
        
        // </editor-fold>
         
        public function toArray() {
            return get_object_vars($this);
        }       
        
        public function toXML() {
            $clase = get_class($this);
            $atributos = $this->toArray();
            $xml = "<$clase>\n";
            foreach ($atributos as $nombre => $valor) {
                $xml .= "\t<$nombre>" . $valor . "</$nombre>\n";
            }
            $xml = $xml . "</$clase>";
            return $xml;
        }
        
        public function toJSON() {
            return json_encode($this->toArray(), JSON_HEX_TAG );
        }
        
        public function toString() {
            $clase = get_class($this);
            $atributos = $this->toArray();
            $string = "$clase {";
            foreach ($atributos as $nombre => $valor) {
                $string .= "($nombre => $valor) " ;
            }
            $string .= "}";
            return $string;
        }
    }
?>
