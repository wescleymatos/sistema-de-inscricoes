<?php

    class Estado {

        private $idEstado;
        private $uf;
        private $estado;

        public function __construct(){

        }

        public function getIdEstado(){
            return $this->idEstado;
        }

        public function setIdEstado($idEstado){
            $this->idEstado = $idEstado;
        }

        public function getUf(){
            return $this->uf;
        }

        public function setUf($uf){
            $this->uf = $uf;
        }

        public function getEstado(){
            return $this->estado;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }
    }

?>

