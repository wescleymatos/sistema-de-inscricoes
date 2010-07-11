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

    $nome = $_POST['username'];
    $senha   = $_POST['pwd'];
    $loginDao = new LoginDao;
    $userLogin = new Session;
    $userPerfil = new Session;


    $retorno = $loginDao->verificaLogin($nome, $senha);

    if($retorno != null){
        $userLogin->setSession("userLogin", $retorno->getNome());
        $userPerfil->setSession("userPerfil", $retorno->getPerfil());

        echo "<script>window.location=('../index.php')</script>";
    } else {
        echo "<script>window.location=('../login.php')</script>";
    }


?>

