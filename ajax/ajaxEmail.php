<?php

    function __autoload($classe){
        $pastas = array('../class/connection', '../class/controller', '../class/model');

        foreach($pastas as $pasta){
            if(file_exists("{$pasta}/{$classe}.class.php")){
                include_once("{$pasta}/{$classe}.class.php");
            }
        }
    }


    $email = strtoupper($_POST['email']);

    $usuarioEmail = new UsuarioDao();
    $retorno = $usuarioEmail->verificaEmailAjax($email);

    sleep(2);

    if($retorno == $email){
        echo true;
    } else {
        echo false;
    }

?>

