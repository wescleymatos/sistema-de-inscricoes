<?php

    class Login {

        private $nome;
        private $senha;
        private $perfil;

        public function __construct(){

        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function setSenha($senha){
            $this->senha = $senha;
        }

        public function getPerfil(){
            return $this->perfil;
        }

        public function setPerfil($perfil){
            $this->perfil = $perfil;
        }

    }

?>

