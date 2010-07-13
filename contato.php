<?php
    session_start();

    function __autoload($classe){
        $pastas = array('class/connection', 'class/controller', 'class/model');

        foreach($pastas as $pasta){
            if(file_exists("{$pasta}/{$classe}.class.php")){
                include_once("{$pasta}/{$classe}.class.php");
            }
        }
    }

    new Session;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>1° Conferência Missionária - Área Norte</title>
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link type="text/css" href="css/menu.css" rel="stylesheet" />
<link rel="stylesheet" href="css/fx.slide.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<style>
#boxTexto{
    font-size: 15px;
    text-align:center;
    background: #FFF url('images/box-contato.png');
    margin: 50px 0px 20px 75px;
    width:700px;
    height:115px;
}

#textContato{
    padding-top: 20px;
}
</style>
</head>
<body>
<?php include('incs/panel.php'); ?>
<div id="wrapper">
	<div id="top" class="clear">

	</div>

	<?php include('incs/menu.php'); ?>

	<div id="body" class="clear">
		<div id="content" class="column-left">
			<h2>>>> Contato</h2>
            <br />
            <fieldset>
				<form action="incs/emailContato.php" method="post" id="formContato">
                        <p><label for="nome">Nome</label>
                          <input type="text" name="nome" id="nome" /></p>
                        <p><label for="email">E-mail</label>
                          <input type="text" name="email" id="email" /></p>
                        <p><label for="assunto">Assunto</label>
                          <input type="text" name="assunto" id="assunto" /></p>
                        <p><label for="mensagem">Mensagem</label>
                            <textarea cols="46" rows="6" id="mensagem" name="mensagem"></textarea>
                        </p>
                        <p>
                            <input type="submit" value="Finalizar" name="enviar" id="enviar" class="botao" />
                            <input type="reset" value="Limpar" name="limpar" id="limpar" />
                        </p>
                    </form>
			</fieldset>
	        <div id="boxTexto">
                <h4 id ="textContato" class="contato">Daise Silva: (84)3221-2421 ou 3201-1501 ou daysegato@hotmail.com</h4>
                <h4 class="contato">Ricardo Papachristodoulou: (84)3221-2421 ou 3201-1501 ou distritoset@hotmail.com</h4>
                <h4 class="contato">Carol Beltrão Papachristodoulou: (84)8803-4501 ou carolbeltrao@gmail.com</h4>
            </div>
		</div>
	</div>
	<?php include('incs/footer.php'); ?>
</div>
</body>
</html>

