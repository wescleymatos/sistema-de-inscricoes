<?php

    class EstadoCivil {

        private $idEstadoCivil;
        private $estadoCivil;

        public function __construct(){

        }

        public function getIdEstadoCivil(){
            return $this->idEstadoCivil;
        }

        public function setIdEstadoCivil($idEstadoCivil){
            $this->idEstadoCivil = $idEstadoCivil;
        }

        public function getEstadoCivil(){
            return $this->estadoCivil;
        }

        public function setEstadoCivil($estadoCivil){
            $this->estadoCivil = $estadoCivil;
        }
    }


?>

