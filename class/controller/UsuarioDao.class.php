<?php

    class UsuarioDao {


        //INSERT NO DB
        public function salvarUsuario($usuario, $dataAtual){

            $con = ConnectionMysql::conectar();

            try {

                $sql = "INSERT INTO usuario (idUsuario, nome, email, igreja, dataNascimento, telefone, cidade, estado_idEstado, estadoCivil_idEstadoCivil, dataCadastro) VALUES (?,?,?,?,?,?,?,?,?,?)";

                $ps = $con->prepare($sql);
                $ps->bindValue(1, null);
                $ps->bindValue(2, $usuario->getNome(), PDO::PARAM_STR);
                $ps->bindValue(3, $usuario->getEmail(), PDO::PARAM_STR);
                $ps->bindValue(4, $usuario->getIgreja(), PDO::PARAM_STR);
                $ps->bindValue(5, $usuario->getDataNascimento());
                $ps->bindValue(6, $usuario->getTelefone(), PDO::PARAM_STR);
                $ps->bindValue(7, $usuario->getCidade(), PDO::PARAM_STR);
                $ps->bindValue(8, $usuario->getIdEstado(), PDO::PARAM_INT);
                $ps->bindValue(9, $usuario->getIdEstadoCivil(), PDO::PARAM_INT);
                $ps->bindValue(10, $dataAtual);

                if($ps->execute()) {
                    $retorno = true;
                } else {
                    $retorno = false;
                }

                $con = null;

            } catch (PDOException $e) {
                echo "eita" . $e->getMessage();
            }

            return $retorno;
        }



        //SELECT NO DB
        public function verificaEmailAjax($email){

            $con = ConnectionMysql::conectar();

            try {

                $sql = "SELECT email FROM usuario where email = ?";

                $ps = $con->prepare($sql);
                $ps->bindValue(1, $email);

                $ps->execute();
                $rs = $ps->fetch(PDO::FETCH_LAZY);

                if($rs != null) {
                    $retorno = $rs->email;
                } else {
                    $retorno = null;
                }

                $con = null;

            } catch (PDOException $e) {
                echo "eita" . $e->getMessage();
            }

            return $retorno;
        }


        public function listaGeral(){

            $array = array();

            $con = ConnectionMysql::conectar();

            try {

                $sql = "SELECT * from usuario, estado where estado_idEstado = idEstado ORDER BY nome";

                $ps = $con->prepare($sql);
                $ps->execute();
                $rs = $ps->fetchAll(PDO::FETCH_ASSOC);

                if($rs){
                    foreach($rs as $r){
                        $usuario = new Usuario();
                        $usuario->setIdUsuario($r['idUsuario']);
                        $usuario->setNome($r['nome']);
                        $usuario->setEmail($r['email']);
                        $usuario->setValidado($r['validado']);
                        $usuario->setUf($r['uf']);
                        $array[] = $usuario;
                    }
                    $retorno = $array;
                } else {
                    $retorno = null;
                }

            } catch (PDOException $e) {
                echo "eita" . $e->getMessage();
            }

            return $retorno;
        }


         public function listaValidado(){

            $array = array();

            $con = ConnectionMysql::conectar();

            try {

                $sql = "SELECT * from usuario, estado where estado_idEstado = idEstado and validado = 1 ORDER BY nome";

                $ps = $con->prepare($sql);
                $ps->execute();
                $rs = $ps->fetchAll(PDO::FETCH_ASSOC);

                if($rs){
                    foreach($rs as $r){
                        $usuario = new Usuario();
                        $usuario->setNome($r['nome']);
                        $usuario->setEmail($r['email']);
                        $usuario->setTelefone($r['telefone']);
                        $usuario->setIgreja($r['igreja']);
                        $usuario->setDataNascimento($r['dataNascimento']);
                        $usuario->setUf($r['uf']);
                        $array[] = $usuario;
                    }
                    $retorno = $array;
                } else {
                    $retorno = null;
                }

            } catch (PDOException $e) {
                echo "eita" . $e->getMessage();
            }

            return $retorno;
        }


        public function listaNaoValidado(){

            $array = array();

            $con = ConnectionMysql::conectar();

            try {

                $sql = "SELECT * from usuario, estado where estado_idEstado = idEstado and validado = 0 ORDER BY nome";

                $ps = $con->prepare($sql);
                $ps->execute();
                $rs = $ps->fetchAll(PDO::FETCH_ASSOC);

                if($rs){
                    foreach($rs as $r){
                        $usuario = new Usuario();
                        $usuario->setNome($r['nome']);
                        $usuario->setEmail($r['email']);
                        $usuario->setTelefone($r['telefone']);
                        $usuario->setIgreja($r['igreja']);
                        $usuario->setDataNascimento($r['dataNascimento']);
                        $usuario->setUf($r['uf']);
                        $array[] = $usuario;
                    }
                    $retorno = $array;
                } else {
                    $retorno = null;
                }

            } catch (PDOException $e) {
                echo "eita" . $e->getMessage();
            }

            return $retorno;
        }


        public function manipulaUsuario($idUsuario){

            $con = ConnectionMysql::conectar();

            try {

                $sql = "
                        SELECT *
                        FROM usuario
                        LEFT JOIN estado ON estado_idEstado = idEstado
                        LEFT JOIN estadoCivil ON estadoCivil_idEstadoCivil = idEstadoCivil
                        LEFT JOIN tipoPagamento on tipoPagamento_idTipoPagamento = idTipoPagamento
                        WHERE idUsuario = ?
                       ";

                $ps = $con->prepare($sql);
                $ps->bindValue(1, $idUsuario);

                $ps->execute();
                $rs = $ps->fetch(PDO::FETCH_ASSOC);

                if($rs != null) {
                    $usuario = new Usuario();
                        $usuario->setIdUsuario($rs['idUsuario']);
                        $usuario->setNome($rs['nome']);
                        $usuario->setIgreja($rs['igreja']);
                        $usuario->setDataNascimento($rs['dataNascimento']);
                        $usuario->setDataCadastro($rs['dataCadastro']);
                        $usuario->setValidado($rs['validado']);
                        $usuario->setEmail($rs['email']);
                        $usuario->setTelefone($rs['telefone']);
                        $usuario->setUf($rs['uf']);
                        $usuario->setCidade($rs['cidade']);
                        $usuario->setIdEstado($rs['estado_idEstado']);
                        $usuario->setEstadoCivil($rs['estadoCivil']);
                        $usuario->setIdEstadoCivil($rs['estadoCivil_idEstadoCivil']);
                        $usuario->setTipoPagamento($rs['tipoPagamento']);
                        $usuario->setIdTipoPagamento($rs['tipoPagamento_idTipoPagamento']);

                        $retorno = $usuario;
                } else {
                    $retorno = null;
                }

                $con = null;

            } catch (PDOException $e) {
                echo "eita" . $e->getMessage();
            }

            return $retorno;
        }


        //DELETE NO DB
        public function deletarUsuario($idUsuario){

            $con = ConnectionMysql::conectar();

            try {

                $sql = "DELETE from usuario where idUsuario = ?";

                $ps = $con->prepare($sql);
                $ps->bindValue(1, $idUsuario);


                if($ps->execute()) {
                    $retorno = true;
                } else {
                    $retorno = false;
                }

                $con = null;

            } catch (PDOException $e) {
                echo "eita" . $e->getMessage();
            }

            return $retorno;
        }



        //UPDATE NO DB
        public function validarUsuario($idUsuario, $validado){

            $con = ConnectionMysql::conectar();

            try {

                $sql = "UPDATE usuario SET validado = ? WHERE idUsuario = ?";

                $ps = $con->prepare($sql);
                $ps->bindValue(1, $validado);
                $ps->bindValue(2, $idUsuario);

                if($ps->execute()) {
                    $retorno = true;
                } else {
                    $retorno = false;
                }

                $con = null;

            } catch (PDOException $e) {
                echo "eita" . $e->getMessage();
            }

            return $retorno;
        }


        public function atualizarUsuario($usuario){

            $con = ConnectionMysql::conectar();

            try {

                $sql = "UPDATE usuario SET nome = ?, email = ?, igreja = ?, dataNascimento = ?, telefone = ?, cidade = ?, tipoPagamento_idTipoPagamento = ?, estado_idEstado = ?, estadoCivil_idEstadoCivil = ? WHERE idUsuario = ?";

                $ps = $con->prepare($sql);
                $ps->bindValue(1, $usuario->getNome());
                $ps->bindValue(2, $usuario->getEmail());
                $ps->bindValue(3, $usuario->getIgreja());
                $ps->bindValue(4, $usuario->getDataNascimento());
                $ps->bindValue(5, $usuario->getTelefone());
                $ps->bindValue(6, $usuario->getCidade());
                $ps->bindValue(7, $usuario->getIdTipoPagamento());
                $ps->bindValue(8, $usuario->getIdEstado());
                $ps->bindValue(9, $usuario->getIdEstadoCivil());
                $ps->bindValue(10, $usuario->getIdUsuario());

                if($ps->execute()) {
                    $retorno = true;
                } else {
                    $retorno = false;
                }

                $con = null;

            } catch (PDOException $e) {
                echo "eita" . $e->getMessage();
            }

            return $retorno;
        }

    }

?>

