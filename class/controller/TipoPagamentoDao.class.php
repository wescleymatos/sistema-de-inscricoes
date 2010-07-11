<?php

    class TipoPagamentoDao {

        public function listaTipoPagamento(){

            $array = array();

            $con = ConnectionMysql::conectar();

            try {

                $sql = "SELECT * from tipoPagamento";

                $ps = $con->prepare($sql);
                $ps->execute();
                $rs = $ps->fetchAll(PDO::FETCH_ASSOC);

                if($rs){
                    foreach($rs as $r){
                        $tipoPagamento = new TipoPagamento();
                        $tipoPagamento->setIdTipoPagamento($r['idTipoPagamento']);
                        $tipoPagamento->setTipoPagamento($r['tipoPagamento']);
                        $array[] = $tipoPagamento;
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

