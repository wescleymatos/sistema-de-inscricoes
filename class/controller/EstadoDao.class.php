<?php

    class EstadoDao {

        public function listaEstado(){

            $array = array();

            $con = ConnectionMysql::conectar();

            try {

                $sql = "SELECT * from estado";

                $ps = $con->prepare($sql);
                $ps->execute();
                $rs = $ps->fetchAll(PDO::FETCH_ASSOC);

                if($rs){
                    foreach($rs as $r){
                        $estado = new Estado();
                        $estado->setIdEstado($r['idEstado']);
                        $estado->setUf($r['uf']);
                        $estado->setEstado($r['estado']);
                        $array[] = $estado;
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
    }

?>

