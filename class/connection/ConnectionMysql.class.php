<?php

    require_once('FactoryAbstract.class.php');

    class ConnectionMysql extends FactoryAbstract{

        private static $dsn = "mysql:host=localhost;port=3306;dbname=mni";
        private static $user = "root";
        private static $pass = "";

        public function __construct(){
            parent::__construct ();
        }

        static function conectar(){

            try {
                $con = new PDO(self::$dsn, self::$user, self::$pass);
            } catch(PDOException $e){
                echo "Erro: " . $e->getMessage();
                die();
            }

            return $con;
        }
    }

?>

