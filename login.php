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
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link type="text/css" href="css/menu.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#username").focus(function(){
            $("#username").css("background", "#EFEEEE");
        });

        $("#pwd").focus(function(){
            $("#pwd").css("background", "#EFEEEE");
        });
    });
</script>
</head>
<body>
<div id="wrapper">
	<div id="top" class="clear">

	</div>

	<?php include('incs/menu.php'); ?>

	<div id="body" class="clear">
		<div>
			<div id="divLogin">
                <form action="incs/validaLogin.php" method="post" id="formLogin">
                    <p><label>Username</label><br />
                    <input type="text" id="username" name="username"/></p>
                    <p><label>Password</label><br />
                    <input type="password" id="pwd" name="pwd"/></p>
                    <input type="submit" value="Log in" id="logar" name="logar"/>
                </form>
            </div>
		</div>
	</div>

	<?php include('incs/footer.php'); ?>
</div>
</body>
</html>

