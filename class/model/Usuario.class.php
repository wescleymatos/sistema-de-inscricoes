<?php

    class Usuario {

        private $idUsuario;
        private $nome;
        private $email;
        private $igreja;
        private $dataNascimento;
        private $dataCadastro;
        private $validado;
        private $telefone;
        private $telefone2;
        private $cidade;
        private $idEstadoCivil;
        private $estadoCivil;
        private $idEstado;
        private $estado;
        private $uf;
        private $idTipoPagamento;
        private $tipoPagamento;

        public function __construct(){

        }

        public function getIdUsuario(){
            return $this->idUsuario;
        }

        public function setIdUsuario($idUsuario){
            $this->idUsuario = $idUsuario;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getIgreja(){
            return $this->igreja;
        }

        public function setIgreja($igreja){
            $this->igreja = $igreja;
        }

        public function getDataNascimento(){
            return $this->dataNascimento;
        }

        public function setDataNascimento($dataNascimento){
            $this->dataNascimento = $dataNascimento;
        }

        public function getDataCadastro(){
            return $this->dataCadastro;
        }

        public function setDataCadastro($dataCadastro){
            $this->dataCadastro = $dataCadastro;
        }

        public function getValidado(){
            return $this->validado;
        }

        public function setValidado($validado){
            $this->validado = $validado;
        }

        public function getTelefone(){
            return $this->telefone;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        public function getTelefone2(){
            return $this->telefone2;
        }

        public function setTelefone2($telefone2){
            $this->telefone2 = $telefone2;
        }

        public function getCidade(){
            return $this->cidade;
        }

        public function setCidade($cidade){
            $this->cidade = $cidade;
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

        public function getIdEstado(){
            return $this->idEstado;
        }

        public function setIdEstado($idEstado){
            $this->idEstado = $idEstado;
        }

        public function getEstado(){
            return $this->estado;
        }

        public function setEstado($estado){
            $this->estado = $estado;
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

        public function getUf(){
            return $this->uf;
        }

        public function setUf($uf){
            $this->uf = $uf;
        }


    }

?>

