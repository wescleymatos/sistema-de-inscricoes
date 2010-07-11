<?php

    class LoginDao {

        public function verificaLogin($login, $senha){

            $con = ConnectionMysql::conectar();

            try {

                $sql = "SELECT login, senha, perfil FROM logon where login = ? and senha = ?";

                $ps = $con->prepare($sql);
                $ps->bindValue(1, $login);
                $ps->bindValue(2, $senha);

                $ps->execute();
                $rs = $ps->fetch(PDO::FETCH_LAZY);

                if($rs != null) {
                    $login = new Login;
                    $login->setNome($rs->login);
                    $login->setPerfil($rs->perfil);

                    $retorno = $login;
                } else {
                    $retorno = null;
                }

                $con = null;

            } catch (PDOException $e) {
                echo "eita" . $e->getMessage();
            }

            return $retorno;
        }
    }

?>

