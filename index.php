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
<link rel="stylesheet" href="css/fx.slide.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/easySlider1.5.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#slider").easySlider({
		    controlsShow: false,
		    continuous: true,
		    auto: true
		});
	});
</script>
</head>
<body>
<?php include('incs/panel.php'); ?>
<div id="wrapper">
	<div id="top" class="clear">

	</div>

	<?php include('incs/menu.php'); ?>

	<div id="body" class="clear">
		<div>
			    <div id="slider">
		            <ul>
			            <li><a><img src="images/slide/1.jpg" alt="" /></a></li>
			            <li><a><img src="images/slide/2.jpg" alt="" /></a></li>
			            <li><a><img src="images/slide/3.jpg" alt="" /></a></li>
			            <li><a><img src="images/slide/4.jpg" alt="" /></a></li>
			            <li><a><img src="images/slide/5.jpg" alt="" /></a></li>
		            </ul>
	            </div>
		</div>
	</div>

	<?php include('incs/footer.php'); ?>
</div>
</body>
</html>

