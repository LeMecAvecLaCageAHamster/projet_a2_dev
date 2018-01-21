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

		if(isset($_GET['logout'])){
			unset($_SESSION);
			session_destroy();
		}

		if($_POST['user'] && $_POST['password']){

			$db = new PDO('mysql:host=localhost;dbname=betterave;charset=utf8', 'root', '');
			$response = $db->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC);

			foreach ($response as $user) {
				if($_POST['user'] == $user['login']){
					if($_POST['password'] == $user['password']){
						$_SESSION['user'] = $_POST['user'];
						$_SESSION['password'] = $_POST['password'];
						break;
					}
				}
			}

			if(empty($_SESSION['user'])){
				$error = "Bad Authentification !";
			}
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


	<?php if($_SESSION['user']): ?>
		<div id="logout">
			<h4>Connected as <?= $_SESSION['user'] ?></h4>
			<a href="index.php?logout">Logout</a>
		</div>
	<?php endif; ?>

</body>
<footer>
	<script src="js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</footer>
</html>