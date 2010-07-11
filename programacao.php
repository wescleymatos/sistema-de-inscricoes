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
<script type="text/javascript" src="js/mootools-1.2-core-yc.js"></script>
<script type="text/javascript" src="js/mootools-1.2-more.js"></script>
<script type="text/javascript" src="js/fx.slide.js"></script>
</head>
<body>
<?php include('incs/panel.php'); ?>
<div id="wrapper">
	<div id="top" class="clear">

	</div>

	<?php include('incs/menu.php'); ?>

	<div id="body" class="clear">
		<div id="content" class="column-left">
			<h2>>>> Programação</h2>
            <br />
            <table cellspacing="0">
				<tr>
					<th colspan="2">SEXTA | 30/07/10</th>
				</tr>
				<tr>
					<td class="tdFixo"><h4>Atividade</h4></td>
					<td class="tdFixo"><h4>Horários</h4></td>
				</tr>
                <tr>
					<td class="tdFixo"><h5>Abertura</h5></td>
					<td class="tdFixo"><h5>19:30h</h5></td>
				</tr>
				<tr>
					<td class="tdFixo"><h5>Pregação</h5></td>
					<td class="tdFixo"><h5>19:45h</h5></td>
				</tr>
			</table>
            <br />
            <table cellspacing="0">
				<tr>
					<th colspan="2">SÁBADO | 31/07/10</th>
				</tr>
				<tr>
					<td class="tdFixo"><h4>Atividade</h4></td>
					<td class="tdFixo"><h4>Horários</h4></td>
				</tr>
				<tr>
					<td class="tdFixo"><h5>Seminários</h5></td>
					<td class="tdFixo"><h5>14:00h - 15:45h</h5></td>
				</tr>
                <tr>
					<td class="tdFixo"><h5>Coffee Break</h5></td>
					<td class="tdFixo"><h5>15:45h – 16:15h</h5></td>
				</tr>
                <tr>
					<td class="tdFixo"><h5>Seminários</h5></td>
					<td class="tdFixo"><h5>16:15h – 18:00h</h5></td>
				</tr>
                <tr>
					<td class="tdFixo"><h5>Intervalo p/ jantar</h5></td>
					<td class="tdFixo"><h5>18:00h – 19:30h</h5></td>
				</tr>
                <tr>
					<td class="tdFixo"><h5>Culto(Pr. Manoel Lima)</h5></td>
					<td class="tdFixo"><h5>19:30h</h5></td>
				</tr>
			</table>
            <br />
            <table cellspacing="0">
				<tr>
					<th colspan="2">DOMINGO | 01/08/10</th>
				</tr>
				<tr>
					<td class="tdFixo"><h4>Atividade</h4></td>
					<td class="tdFixo"><h4>Horários</h4></td>
				</tr>
				<tr>
					<td class="tdFixo"><h5>Culto de Encerramento c/ Santa Ceia (Pr. Manoel Lima) - Testemunho Missionário</h5></td>
					<td class="tdFixo"><h5>9:00h</h5></td>
				</tr>
			</table>
		</div>
	</div>

	<?php include('incs/footer.php'); ?>
</div>
</body>
</html>

