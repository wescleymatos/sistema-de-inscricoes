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

    $idUsuario = $_POST['usuario'];
    new Session;
    $usuarioDao = new UsuarioDao();
    $tipoPagamentoDao = new TipoPagamentoDao();
    $ed = new EstadoDao();
    $ec = new EstadoCivilDao();
    $tp = new TipoPagamentoDao();
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
<script type="text/javascript" src="../js/jquery.maskedinput.min.js"></script>
<?php include('../incs/base.php'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        //visualizar
        $("#exibir").click(function(){
            $("#vizualizar").css("display", "block");
        });
        $("#upVisualisar").click(function(){
            $("#vizualizar").css("display","none");
        });

        $("#editar").click(function(){
            $("#divEditar").css("display", "block");
        });
        $("#upEditar").click(function(){
            $("#divEditar").css("display","none");
        });


        //imprimir
        $("#imprimir").click(function(){
            $("#formHidden").attr("action", "consulta/imprimir.php");
            $("#formHidden").attr("target", "_blank");
            $("#formHidden").submit();
        });

        $("#dataNasc").mask("99/99/9999");
        $("#telefone").mask("(99)9999-9999");

    });

    function validaUsuario(){
        var valida = confirm("vc deseja realmente validar\n" + $("#nomeValida").val());

		if (valida == true) {
            $("#formValida").attr("action", "cadastro/validarUsuario.php");
            $("#formValida").submit();
        } else {
			return false;
		}
	}

    function deletaUsuario(nome, idUsuario){
        var exclui = confirm("vc deseja realmente excluir\n" + nome);

		if (exclui == true) {
            $("#usuario").val(idUsuario);
            $("#formulario").attr("action", "consulta/deletaUsuario.php");
            $("#formulario").submit();
        } else {
			return false;
		}
	}

	function formEdit(){
        document.getElementById("formEdita").action = "cadastro/editarUsuario.php";
        document.getElementById("formEdita").submit();
    }


</script>
</head>
<body>
<?php include('../incs/panel.php'); ?>
<div id="wrapper">
	<div id="top" class="clear">

	</div>

	<?php include('../incs/menu.php'); ?>

	<div id="body" class="clear">
		<div id="content" class="column-left">
			<h2>>>> Gerencia de Usuário</h2><br />
                <?php

                    if(Session::getSession("userPerfil") != null && Session::getSession("userLogin") != null) {

                ?>
                <table cellspacing="0">
				<tr>
					<th>Nome</th>
					<th>Imprimir</th>
					<th>Visualizar</th>
					<th>Editar</th>
					<th>Remover</th>
					<th>Validar</th>
				</tr>
				<?php
				    $retorno = $usuarioDao->manipulaUsuario($idUsuario);
				?>
				<tr>
					<td><h5><?php echo utf8_encode($retorno->getNome()); ?></h5></td>
					<td><a><img id="imprimir" src="images/icons/attachment.png" alt="" title="Imprimir cadastro"/></a></td>
					<td><a><img id="exibir" src="images/icons/zoom.png" alt="" title="Visualizar cadastro completo."/></a></td>
					<td><a><img id="editar" src="images/icons/edit.png" alt="" title="Editar cadastro."/></a></td>
					<td><a onclick="deletaUsuario('<?php echo $retorno->getNome(); ?>', '<?php echo $retorno->getIdUsuario(); ?>')"><img id="deletar" src="images/icons/remove.png" alt="" title="Deletar cadastro."/></a></td>
					<td><a onclick="validaUsuario()"><img id="validar" src="images/icons/accept.png" alt="" title="Validar cadastro."/></a></td>
				</tr>
			</table>
            <form method="post" id="formulario">
                <input type="hidden" id="usuario" name="usuario" />
            </form>
            <br />
            <br />
            <br />
            <div id="vizualizar" class="vizualizar">
                <table cellspacing="0">
                    <tr>
					    <th colspan="2">Nome</th>
				    </tr>
                    <tr>
					    <td colspan="2"><h5><?php echo utf8_encode($retorno->getNome()); ?></h5></td>
				    </tr>
                    <tr>
					    <th colspan="2">Email</th>
				    </tr>
                    <tr>
					    <td colspan="2"><h5><?php echo $retorno->getEmail(); ?></h5></td>
                    </tr>
                    <tr>
					    <th colspan="2">Igreja</th>
				    </tr>
                    <tr>
					    <td colspan="2"><h5><?php echo utf8_encode($retorno->getIgreja()); ?></h5></td>
				    </tr>
                    <tr>
					    <th>Validado</th>
					    <th>Telefone</th>
				    </tr>
                    <tr>
					    <td><h5><?php echo ($retorno->getValidado() == 0 || $retorno->getValidado() == null) ? "Não" : "Sim"; ?></h5></td>
					    <td><h5><?php echo $retorno->getTelefone(); ?></h5></td>
				    </tr>
                    <tr>
					    <th>Cidade</th>
					    <th>UF</th>
				    </tr>
                    <tr>
					    <td><h5><?php echo utf8_encode($retorno->getCidade()); ?></h5></td>
					    <td><h5><?php echo $retorno->getUf(); ?></h5></td>
				    </tr>
                    <tr>
					    <th>Data de Nascimento</th>
					    <th>Data do Cadastro</th>
				    </tr>
                    <tr>
					    <td><h5><?php echo convData($retorno->getDataNascimento()); ?></h5></td>
					    <td><h5><?php echo convData($retorno->getDataCadastro()); ?></h5></td>
				    </tr>
                    <tr>
					    <th>Estado Civil</th>
					    <th>Tipo de Pagamento</th>
				    </tr>
                    <tr>
					    <td><h5><?php echo utf8_encode($retorno->getEstadoCivil()); ?></h5></td>
					    <td><h5><?php echo utf8_encode($retorno->getTipoPagamento()); ?></h5></td>
				    </tr>
                </table>
                <form method="post" id="formHidden">
                    <input type="hidden" id="usuarioHidden" name="usuario" value="<?php echo $retorno->getIdUsuario(); ?>" />
                    <input type="hidden" id="nomeHidden" name="nome" value="<?php echo utf8_encode($retorno->getNome()); ?>" />
                    <input type="hidden" id="validadoHidden" name="validado" value="<?php echo ($retorno->getValidado() == 0 || $retorno->getValidado() == null) ? 'Não' : 'Sim'; ?>"/>
                    <input type="hidden" id="igrejaHidden" name="igreja" value="<?php echo utf8_encode($retorno->getIgreja()); ?>"/>
                    <input type="hidden" id="emailHidden" name="email" value="<?php echo $retorno->getEmail(); ?>"/>
                    <input type="hidden" id="telefoneHidden" name="telefone" value="<?php echo $retorno->getTelefone(); ?>"/>
                    <input type="hidden" id="cidadeHidden" name="cidade" value="<?php echo utf8_encode($retorno->getCidade()); ?>"/>
                    <input type="hidden" id="ufHidden" name="uf" value="<?php echo $retorno->getUf(); ?>"/>
                    <input type="hidden" id="dataNascHidden" name="dataNasc" value="<?php echo convData($retorno->getDataNascimento()); ?>"/>
                    <input type="hidden" id="dataCadHidden" name="dataCad" value="<?php echo convData($retorno->getDataCadastro()); ?>"/>
                    <input type="hidden" id="estadoCivilHidden" name="estadoCivil" value="<?php echo utf8_encode($retorno->getEstadoCivil()); ?>"/>
                    <input type="hidden" id="tipoPagamentoHidden" name="tipoPagamento" value="<?php echo utf8_encode($retorno->getTipoPagamento()); ?>"/>
                </form>
                <br />
                <table cellspacing="0">
                    <tr>
                        <td><img id="upVisualisar" src="images/icons/up.png" alt="" title="Fechar visualização."/></td>
				    </tr>
                </table>
            </div>
            <div id="divValida">
                <form  method="post" id="formValida">
                    <input type="hidden" id="usuarioValida" name="usuario" value="<?php echo $retorno->getIdUsuario(); ?>" />
                    <input type="hidden" id="validadoValida" name="validado" value="1" />
                    <input type="hidden" id="nomeValida" name="nome" value="<?php echo utf8_encode($retorno->getNome()); ?>" />
                    <input type="hidden" id="emailValida" name="email" value="<?php echo $retorno->getEmail(); ?>" />
                </form>
            </div>
            <div id="divEditar" class="divEditar">
                <fieldset>
				<form  method="post" id="formEdita">
				        <input type="hidden" id="usuario" name="usuario" value="<?php echo $retorno->getIdUsuario(); ?>" />

                        <p><label for="email">E-mail</label>
                          <input type="text" name="email" id="email" value="<?php echo $retorno->getEmail(); ?>" /></p>
                        <p><label for="nome">Nome</label>
                          <input type="text" name="nome" id="nome" value="<?php echo utf8_encode($retorno->getNome()); ?>" /></p>
                        <p><label for="igreja">Igreja</label>
                          <input type="text" name="igreja" id="igreja" value="<?php echo utf8_encode($retorno->getIgreja()); ?>" /></p>
                        <p><label for="dataNasc">Data de Nascimento</label>
                          <input type="text" name="dataNasc" id="dataNasc" maxlength="10" value="<?php echo convData($retorno->getDataNascimento()); ?>" /></p>
                        <p><label for="telefone">Telefone</label>
                          <input type="text" name="telefone" id="telefone" maxlength="13" value="<?php echo $retorno->getTelefone(); ?>" /></p>
                        <p><label for="cidade">Cidade</label>
                          <input type="text" name="cidade" id="cidade" value="<?php echo utf8_encode($retorno->getCidade()); ?>"/></p>

                        <p><label for="estado">Estado</label>
                          <select id="estado" name="estado" >
                           <?php
                                    $estado = $ed->listaEstado();
                                    foreach($estado as $r){
                                        if($r->getIdEstado() == $retorno->getIdEstado()){
                                ?>
                                            <option selected="selected" value="<?php echo $r->getIdEstado(); ?>"><?php echo utf8_encode($r->getEstado()); ?></option>
                                <?php
                                        } else {
                                ?>
                                            <option value="<?php echo $r->getIdEstado(); ?>"><?php echo utf8_encode($r->getEstado()); ?></option>
                                <?php
                                        }
                                    }
                                ?>
                          </select></p>

                        <p><label for="estadoCivil">Estado Civil</label>
                          <select id="estadoCivil" name="estadoCivil" >
                                <?php
                                    $estadoCivil = $ec->listaEstadoCivil();
                                    foreach($estadoCivil as $r){
                                        if($r->getIdEstadoCivil() == $retorno->getIdEstadoCivil()){
                                ?>
                                            <option selected="selected" value="<?php echo $r->getIdEstadoCivil(); ?>"><?php echo utf8_encode($r->getEstadoCivil()); ?></option>
                                <?php
                                        } else {
                                ?>
                                            <option value="<?php echo $r->getIdEstadoCivil(); ?>"><?php echo utf8_encode($r->getEstadoCivil()); ?></option>
                                <?php
                                        }
                                    }
                                ?>
                          </select></p>

                          <p><label for="tipoPagamento">Tipo de Pagamento</label>
                          <select id="tipoPagamento" name="tipoPagamento">
                            <option value="">Escolha</option>
                            <?php
                                    $tipoPagamento = $tp->listaTipoPagamento();
                                    foreach($tipoPagamento as $r){
                                        if($r->getIdTipoPagamento() == $retorno->getIdTipoPagamento()){
                                ?>
                                            <option selected="selected" value="<?php echo $r->getIdTipoPagamento(); ?>"><?php echo utf8_encode($r->getTipoPagamento()); ?></option>
                                <?php
                                        } else {
                                ?>
                                            <option value="<?php echo $r->getIdTipoPagamento(); ?>"><?php echo utf8_encode($r->getTipoPagamento()); ?></option>
                                <?php
                                        }
                                    }
                                ?>
                          </select></p>
                        <p>
                            <input type="button" value="Finalizar" name="enviar" id="enviar" class="botao" onclick="formEdit()"/>
                           <input type="reset" value="Limpar" name="limpar" id="limpar" />
                        </p>
                    </form>
			</fieldset>
			<br />
            <table cellspacing="0">
                <tr>
                    <td><img id="upEditar" src="images/icons/up.png" alt="" title="Fechar visualização."/></td>
				</tr>
            </table>
            </div>
			<?php
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

