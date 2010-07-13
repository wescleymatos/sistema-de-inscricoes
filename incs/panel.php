	<div id="login">
		<div class="loginContent">
			<form action="incs/validaLogin.php" method="post">
				<label for="username"><b>Login: </b></label>
				<input class="field" type="text" name="username" id="username" value="" size="23" />
				<label for="pwd"><b>Senha:</b></label>
				<input class="field" type="password" name="pwd" id="pwd" size="23" />
				<input type="submit" name="submit" value="" class="button_login" />
			</form>
			<div class="left">
            	<label for="rememberme"></label></div>
			<div class="right"><a></a><a></a></div>
		</div>
		<div class="loginClose"><a id="closeLogin">Fechar</a></div>
	</div> <!-- /login -->
<?php

    if(Session::getSession("userPerfil") != null && Session::getSession("userLogin") != null) {

?>
    <div id="container">
		<div id="topLogin">
		<!-- login -->
			<ul class="login">
		    	<li class="left">&nbsp;</li>
		        <li><?php echo Session::getSession("userLogin"); ?></li>
				<li>|</li>
				<li><a id="" href="incs/logoff.php">Sair</a></li>
			</ul> <!-- / login -->
		</div> <!-- / top -->
    </div>
<?php

    } else {

?>
<div id="container">
	<div id="topLogin">
		<!-- login -->
			<ul class="login">
		    	<li class="left">&nbsp;</li>
		        <li>Bem Vindo!</li>
				<li>|</li>
				<li><a id="toggleLogin" href="login.php">Login</a></li>
			</ul> <!-- / login -->
    </div> <!-- / top -->
</div>
<?php

    }

?>

