<?php
    session_start();
    include('../class/controller/Session.class.php');
    new Session;

    if(Session::getSession("userPerfil") != null && Session::getSession("userLogin") != null) {
        Session::closeSession();
        echo "<script>window.location=('../login.php')</script>";
    } else {
        echo "<script>window.location=history.back();</script>";
    }

?>

