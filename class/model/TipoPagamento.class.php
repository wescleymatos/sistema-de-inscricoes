<?php

    class TipoPagamento {

        private $idTipoPagamento;
        private $tipoPagamento;

        public function __construct(){

        }

        public function getIdTipoPagamento(){
            return $this->idTipoPagamento;
        }

        public function setIdTipoPagamento($idTipoPagamento){
            $this->idTipoPagamento = $idTipoPagamento;
        }

        public function getTipoPagamento(){
            return $this->tipoPagamento;
        }

        public function setTipoPagamento($tipoPagamento){
            $this->tipoPagamento = $tipoPagamento;
        }
    }

?>

