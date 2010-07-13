<?php
    session_start();
    include('class/controller/Session.class.php');
    new Session;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>1° Conferência Missionária - Área Norte</title>
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link type="text/css" href="css/menu.css" rel="stylesheet" />
<link rel="stylesheet" href="css/fx.slide.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
</head>
<body>
<?php include('incs/panel.php'); ?>
<div id="wrapper">
	<div id="top" class="clear">

	</div>

	<?php include('incs/menu.php'); ?>

	<div id="body" class="clear">
		<div id="content" class="column-left">
			<h2>>>> Informações</h2>
			<div id="texto">
			    <p><strong><h3>Informações Importantes:</h3></strong></p>
                        <ul>
                            <li><p><strong>Tema:</strong> "Fazendo Discípulos à Semelhança de Cristo”</p></li>
                            <li><p><strong>Preletor: </strong> Pr. Manoel Lima Superintendente do Distrito Norte Missionário da Igreja do Nazareno</p></li>
                            <li><p><strong>Data: </strong> 30/07 a 01/08/10</p></li>
                            <li><p><strong>Local:</strong> Igreja do Nazareno Lagoa Nova End. Av. Bernardo Vieira, 432 – Lagoa Nova – Natal/RN</p></li>
                            <li><p><strong>Alvo: </strong> Atingir o máximo de pessoas da nossa área.</p></li>
                            <li><p><strong>Importante: </strong> Envolvimento de todas as igrejas de Natal na organização, através de todos os ministérios.</p></li>
                            <li><p><strong>Valor da Inscrição: </strong> R$10,00</p></li>
                        </ul>
            </div>
		</div>
	</div>

	<?php include('incs/footer.php'); ?>
</div>
</body>
</html>

