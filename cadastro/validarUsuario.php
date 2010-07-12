<?php

    session_start();

    function __autoload($classe){
        $pastas = array('../class/connection', '../class/controller', '../class/model');

        foreach($pastas as $pasta){
            if(file_exists("{$pasta}/{$classe}.class.php")){
                include_once("{$pasta}/{$classe}.class.php");
            }
        }
    }

    require_once('../class/extra/class.phpmailer.php');

    new Session;
    $usuarioDao = new UsuarioDao();

    $retorno = $usuarioDao->validarUsuario($_POST['usuario'], $_POST['validado']);

    if($retorno == true){

        require_once('../incs/emailValidacao.php');

        echo "<script>window.location=('../consulta/listaGeral.php')</script>";
    }
?>

