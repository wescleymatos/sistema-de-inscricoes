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

    include('../incs/data.php');

    new Session;
    $usuarioDao = new UsuarioDao();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>1° Conferência Missionária - Área Norte</title>
<link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="../css/styles.css" />
<link type="text/css" href="../css/menu.css" rel="stylesheet" />
<link type="text/css" href="../css/demo_table_jui.css" rel="stylesheet" />
<link type="text/css" href="../css/jquery-ui-1.7.2.custom.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/fx.slide.css" type="text/css" media="screen" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/menu.js"></script>
<script type="text/javascript" src="../js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
	    oTable = $('#tabela').dataTable({
		    "bJQueryUI": true,
		    "sPaginationType": "full_numbers"
	    });
    });
</script>
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
			<h2>>>> Lista de Usuários Não Validados</h2><br />
                <?php

                    if(Session::getSession("userPerfil") != null && Session::getSession("userLogin") != null) {
				    $retorno = $usuarioDao->listaNaoValidado();
                        if($retorno != null){
                ?>
                <div class="demo_jui">
                <table id="tabela" cellpadding="0" cellspacing="0" border="0" class="display">
                <thead>
				    <tr>
					    <th>Nome</th>
					    <th>Email</th>
					    <th>Igreja</th>
					    <th>Telefone</th>
					    <th>D. N.</th>
					    <th>Estado</th>
				    </tr>
                </thead>
                <tbody>
				<?php
				    foreach($retorno as $r){
				?>
				<tr>
					<td><h6><?php echo utf8_encode($r->getNome()); ?></a></h6></td>
					<td><h6><?php echo $r->getEmail(); ?></h6></td>
					<td><h6><?php echo utf8_encode($r->getIgreja()); ?></h6></td>
					<td><h6><?php echo $r->getTelefone(); ?></h6></td>
					<td><h6><?php echo convData($r->getDataNascimento());; ?></h6></td>
					<td><h6><?php echo $r->getUf(); ?></h6></td>
				</tr>
				<?php } ?>
                </tbody>
			</table>
            </div>
			<?php } else { ?>
			        <div id="texto">
                        <p><h4>Nenhum registro encontrado!</h4></p>
                    </div>
                    <table cellspacing='0'>
                        <tr>
                            <td><a href='consulta/listaGeral.php'><img id='up' src='images/icons/back.png' alt='' title='Voltar'/><a></td>
				        </tr>
                    </table>
            <?php   }
                } else {
            ?>
            <div id="texto">
                <p><h4>Você não possui permissão para vizualizar o conteúdo desta página. Por favor, volte para a <a href="index.php">home</a> do site ou acesse outro menu de sua preferência. Obrigado!</h4></p>
            </div>
            <?php
                }
            ?>
		</div>
	</div>
    <?php include('../incs/footer.php'); ?>
</div>

