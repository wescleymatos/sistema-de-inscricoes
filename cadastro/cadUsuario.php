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


    include('../incs/data.php');

    $usuario = new Usuario();
    $usuario->setNome(strtoupper(utf8_decode($_POST['nome'])));
    $usuario->setEmail(strtoupper($_POST['email']));
    $usuario->setIgreja(strtoupper(utf8_decode($_POST['igreja'])));
    $usuario->setDataNascimento(convData($_POST['dataNasc']));
    $usuario->setTelefone(strtoupper($_POST['telefone']));
    $usuario->setCidade(strtoupper(utf8_decode($_POST['cidade'])));
    $usuario->setIdEstado($_POST['estado']);
    $usuario->setIdEstadoCivil($_POST['estadoCivil']);
    $dataAtual = date("Y-m-d");

    $usuarioDao = new UsuarioDao();
    $retorno = $usuarioDao->salvarUsuario($usuario, $dataAtual);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>1° Conferência Missionária - Área Norte</title>
<link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="../css/styles.css" />
<link type="text/css" href="../css/menu.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/fx.slide.css" type="text/css" media="screen" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/menu.js"></script>
<script type="text/javascript" src="../js/mootools-1.2-core-yc.js"></script>
<script type="text/javascript" src="../js/mootools-1.2-more.js"></script>
<script type="text/javascript" src="../js/fx.slide.js"></script>
<?php include('../incs/base.php'); ?>
</head>
<body>
<?php include('../incs/panel.php'); ?>
<div id="wrapper">
	<div id="top" class="clear">

	</div>

	<?php include('../incs/menu.php'); ?>

	<div id="body" class="clear">
		<div>
			<h2>>>> Cadastro</h2>

            <?php
                if($retorno == true){
            ?>
                          <div id='texto'>
                            <p><h4>Seu cadastro foi realizado com sucesso!</h4></p>
                            <p><h4>Por favor, verificar sua caixa de email com a confirmação do seu cadastro e as informações para a realização do depósito bancário.</h4></p>
                            <p><h4>Caso você não receba o email, entre em contato conosco enviado nome e email cadastrados para:</h4></p>
                            <p>
                                <ul>
                                    <li><h4>conferencia@nazarenonatal.com.br</h4></li>
                                    <li><h4>ignazanatal@gmail.com</h4></li>
                                </ul>
                            <p>
                          </div>
                          <table cellspacing='0'>
                                <tr>
                                    <td><a href='index.php'><img id='up' src='images/icons/back.png' alt='' title='Voltar para a Home'/><a></td>
				                </tr>
                          </table>
            <?php
                require_once('../incs/emailCadastro.php');

                } else {
                    echo "<div id='texto'>
                            <p><h4>Ocorreu algum problema com a realização do seu cadastro, por favor tentar novamente!</h4></p>
                          </div>
                          <table cellspacing='0'>
                                <tr>
                                    <td><a href='inscricao.php'><img id='up' src='images/icons/back.png' alt='' title='Voltar para página de inscrições'/><a></td>
				                </tr>
                          </table>";
                }
            ?>
		</div>
	</div>

	<?php include('../incs/footer.php'); ?>
</div>
</body>
</html>

