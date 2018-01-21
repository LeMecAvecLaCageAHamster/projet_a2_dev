<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Betterave Game</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="icon" href="src/img/beetroot.ico">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>
	
	<?php
		session_start();
		error_reporting(0);

		if($_POST['user'] && $_POST['password']){
			$_SESSION['user'] = $_POST['user'];
			$_SESSION['password'] = $_POST['password'];
		}

		if(empty($_SESSION)){
			require_once("html/connection.html");
		}else{
			switch ($_GET['page']) {
				case 'level':
					require_once("html/level.html");
					break;
				case 'game':
					require_once("html/game.html");
					break;
				default:
					require_once("html/menu.html");
					break;
			}
		}
	?>

</body>
<footer>
	<script src="js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</footer>
</html>