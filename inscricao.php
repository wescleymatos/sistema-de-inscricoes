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
    $ed = new EstadoDao();
    $ec = new EstadoCivilDao();
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
<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>

<script type="text/javascript">
jQuery(function($){
   $("#dataNasc").mask("99/99/9999");
   $("#telefone").mask("(99)9999-9999");
});
    function validaForm(){

        if(document.getElementById("nome").value == "" || document.getElementById("email").value == "" ||
            document.getElementById("igreja").value == "" || document.getElementById("dataNasc").value == "" ||
            document.getElementById("telefone").value == "" || document.getElementById("estado").value == "" ||
            document.getElementById("cidade").value == "" || document.getElementById("estadoCivil").value == ""){
            alert("Todos os campos são obrigatórios!");
            return false;
        }

        document.getElementById("formInscricao").action = "cadastro/cadUsuario.php";
        document.getElementById("formInscricao").submit();
    }


    function verificaEmail(){

    if ($("#email").val() != "") {
          var regexmail = /^[\w!#$%&amp;'*+\/=?^`{|}~-]+(\.[\w!#$%&amp;'*+\/=?^`{|}~-]+)*@(([\w-]+\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
          if (regexmail.test($("#email").val())) {
              $(".alerta").html("");

              var email = $("#email").val();

                $.ajax({

                    type: "POST",
                    url: "ajax/ajaxEmail.php",
                    data: ({email : email}),
                    beforeSend: function() {
                        $("#email").removeClass("denied");
                        $("#email").removeClass("approved");
                        $("#email").addClass("thinking");
                    },
                    success: function(text){

                        if(text == true){
                            $("#email").removeClass("thinking");
                            $("#email").removeClass("approved");
                            $("#email").addClass("denied");
                            $(".alerta").html("Email já cadastrado!");

                        } else {
                            $("#email").removeClass("thinking");
                            $("#email").removeClass("denied");
                            $("#email").addClass("approved");
                        }

                    },
                    error: function(text){
                        alert("Erro ao verificar email! Tente mais tarde.");
                    }
                });

          } else {
                $(".alerta").html("E-mail inválido!");
                return false;
          }
        }
    }

</script>
</head>
<body>
<?php include('incs/panel.php'); ?>
<div id="wrapper">
	<div id="top" class="clear">

	</div>

	<?php include('incs/menu.php'); ?>

	<div id="body" class="clear">
		<div id="content" class="column-left">
			<h2>>>> Inscrições</h2>
			<br />
            <fieldset>
				<form  method="post" id="formInscricao">
                        <p><label for="email">E-mail</label>
                          <input type="text" name="email" id="email" onblur="verificaEmail()" /><span class="alerta"></span></p>
                        <p><label for="nome">Nome</label>
                          <input type="text" name="nome" id="nome" /></p>
                        <p><label for="igreja">Igreja</label>
                          <input type="text" name="igreja" id="igreja" /></p>
                        <p><label for="dataNasc">Data de Nascimento</label>
                          <input type="text" name="dataNasc" id="dataNasc" maxlength="10" /></p>
                        <p><label for="telefone">Telefone</label>
                          <input type="text" name="telefone" id="telefone" maxlength="13" /></p>
                        <p><label for="cidade">Cidade</label>
                          <input type="text" name="cidade" id="cidade"/></p>

                        <p><label for="estado">Estado</label>
                          <select id="estado" name="estado">
                            <option value="">Escolha</option>
                            <?php
                                $retorno = $ed->listaEstado();
                                foreach($retorno as $r){ ?>
                            <option value="<?php echo $r->getIdEstado(); ?>"><?php echo utf8_encode($r->getEstado()); ?></option>
                                <?php }?>
                          </select></p>

                        <p><label for="estadoCivil">Estado Civil</label>
                          <select id="estadoCivil" name="estadoCivil">
                            <option value="">Escolha</option>
                            <?php
                                $retorno = $ec->listaEstadoCivil();
                                foreach($retorno as $r){ ?>
                            <option value="<?php echo $r->getIdEstadoCivil(); ?>"><?php echo utf8_encode($r->getEstadoCivil()); ?></option>
                                <?php }?>
                          </select></p>

                        <p><input type="button" value="Finalizar" name="enviar" id="enviar" class="botao" onclick="validaForm()" />
                           <input type="reset" value="Limpar" name="limpar" id="limpar" />
                        </p>
                    </form>
			</fieldset>
		</div>
	</div>
	<?php include('incs/footer.php'); ?>
</div>
</body>
</html>

