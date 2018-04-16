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

		require_once('controllers/db.php');

		// error_reporting(0);
		session_start();
		$db = new DB('root', '');

		/* ----------------------------------------------------------------*/

		/* dans le cas de la déconnection */
		if(isset($_POST['logout'])){
			unset($_SESSION);
			session_destroy();
		}

		/* dans le cas de l'inscription */
		if(isset($_POST['register'])){

			if(isset($_POST['user'], $_POST['password'], $_POST['check-password'])){

				if($_POST['password'] == $_POST['check-password']){		
					$addUser = $db->addUser($_POST['user'], $_POST['password']);

					if($addUser){
						$_SESSION['user'] = $_POST['user'];
					}else{
						$error = "Cet utilisateur est déjà utilisé ¯\_(ツ)_/¯";
					}

				}else{
					$error = "Les mots de passe ne correspondent pas !";
				}

			}else{
				$error = " Tu dois remplir tous les champs !";
			}

		/* dans le cas de la connection */
		}else if(isset($_POST['user'], $_POST['password']) && $_POST['password']){

			$login = $db->login($_POST['user'], $_POST['password']);

			if($login){
				$_SESSION['user'] = $_POST['user'];
			}else{
				$error = "L'utilisateur et/ou le mot de passe est incorrect !";
			}
		}


		if(empty($_SESSION)){ // utilisateur non connecté / inscrit

			if(isset($_GET['register'])){
				require_once("html/register.html");
			}else{
				require_once("html/connection.html");
			}
		}else{

			$_GET['page'] = isset($_GET['page']) ? $_GET['page'] : "";
			
			/* système de navigation dans l'application */
			switch ($_GET['page']) {
				case 'level':
					require_once("html/level.html");
					break;
				case 'game':
					require_once("html/game.html");
					break;
				case 'about':
					require_once("html/about.html");
					break;
				default:
					require_once("html/menu.html");
					break;
			}
		}


	if(isset($_SESSION['user'])): ?>
		<div id="logout">
			<form method="post" action="index.php">
				Bonjour, <?= $_SESSION['user'] ?>
				<input type="submit" name="logout" class="btn btn-light" value="Logout">
			</form>
		</div>
	<?php endif;

?>
</body>
<footer>
	<script src="js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</footer>
</html>
