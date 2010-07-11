<?php
    session_start();
    function __autoload($classe){
        $pastas = array('../class/connection', '../class/controller', '../class/model', '../class/extra');

        foreach($pastas as $pasta){
            if(file_exists("{$pasta}/{$classe}.class.php")){
                include_once("{$pasta}/{$classe}.class.php");
            }
        }
    }

    require_once('../class/extra/PhpMailer.class.php');

    new Session;
    $mail = new PHPMailer();

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
		<div id="content" class="column-left">
			<h2>>>> Cadastro</h2>

            <?php
                if($retorno == true){ $mail = new PHPMailer();
            ?>
                          <div id='texto'>
                            <p><h4>Seu cadastro foi realizado com sucesso!</h4></p>
                          </div>
                          <table cellspacing='0'>
                                <tr>
                                    <td><a href='index.php'><img id='up' src='images/icons/back.png' alt='' title='Voltar para Lista Geral'/><a></td>
				                </tr>
                          </table>
            <?php

                //$mail->IsSMTP(); // Define que a mensagem será SMTP
                $mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP
                //$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
                //$mail->Username = 'seumail@dominio.net'; // Usuário do servidor SMTP
                //$mail->Password = 'senha'; // Senha do servidor SMTP

                // Define o remetente
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                $mail->From = "wescleymatos@gmail.com"; // Seu e-mail
                $mail->FromName = "Wescley Matos"; // Seu nome

                // Define os destinatário(s)
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                //$mail->AddAddress('fulano@dominio.com.br', 'Fulano da Silva');
                $mail->AddAddress($_POST['email']);
                //$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
                //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

                // Define os dados técnicos da Mensagem
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
                $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

                // Define a mensagem (Texto e Assunto)
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                $mail->Subject  = "Cadastro Conferência Missionária 2010"; // Assunto da mensagem
                $mail->Body = "Este é o corpo da mensagem de teste, em <b>HTML</b>! <br /> <img src='http://blog.thiagobelem.net/wp-includes/images/smilies/icon_smile.gif' alt=':)' class='wp-smiley'> ";
                $mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n <img src='http://blog.thiagobelem.net/wp-includes/images/smilies/icon_smile.gif' alt=':)' class='wp-smiley'> ";

                // Define os anexos (opcional)
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                //$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo

                // Envia o e-mail
                $enviado = $mail->Send();

                // Limpa os destinatários e os anexos
                $mail->ClearAllRecipients();
                $mail->ClearAttachments();

                // Exibe uma mensagem de resultado
                if ($enviado) {
                echo "E-mail enviado com sucesso!";
                } else {
                echo "Não foi possível enviar o e-mail.<br /><br />";
                echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
                }



                } else {
                    echo "<div id='texto'>
                            <p><h4>Ocorreu algum problema com a realização do seu cadastro, por favor tentar novamente!</h4></p>
                          </div>
                          <table cellspacing='0'>
                                <tr>
                                    <td><a href='inscricao.php'><img id='up' src='images/icons/back.png' alt='' title='Voltar para Lista Geral'/><a></td>
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

