<?php

    class Session {

        public function __construct(){
            
        }


        public function getSession($nomeSession){
            return $_SESSION[$nomeSession];
        }


        public function setSession($nomeSession, $valorSession){
            $_SESSION[$nomeSession] = $valorSession;
        }


        public function closeSession(){
            $_SESSION = array();
            session_destroy();
        }
    }

?>

