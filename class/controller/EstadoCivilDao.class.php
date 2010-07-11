<?php

    class EstadoCivilDao {

        public function listaEstadoCivil(){

            $array = array();

            $con = ConnectionMysql::conectar();

            try {

                $sql = "SELECT * from estadoCivil";

                $ps = $con->prepare($sql);
                $ps->execute();
                $rs = $ps->fetchAll(PDO::FETCH_ASSOC);

                if($rs){
                    foreach($rs as $r){
                        $estado = new EstadoCivil();
                        $estado->setIdEstadoCivil($r['idEstadoCivil']);
                        $estado->setEstadoCivil($r['estadoCivil']);
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

