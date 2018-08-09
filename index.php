<?php

namespace App;
require_once 'autoloader.php';

use App\Model\DB;
use App\View\LevelView;
use App\View\GameView;
use App\Controller\UserController;

session_start();
$db = DB::getInstance('root', 'root');
$userController = new UserController;

// Logout
if(isset($_POST['logout'])){
	unset($_SESSION);
	session_destroy();
}

// Register
if(isset($_POST['register'])){
	if(isset($_POST['user'], $_POST['password'], $_POST['check-password'])){
		if($_POST['password'] == $_POST['check-password']){		
			$addUser = $userController->addUser($_POST['user'], $_POST['password']);

			if($addUser){
				$_SESSION['user'] = $_POST['user'];
			}else{
				$error = "Cet utilisateur est déjà utilisé ¯\_(ツ)_/¯";
			}
		}else{
			$error = "Les mots de passe ne correspondent pas !";
		}
	}else{
		$error = "Tu dois remplir tous les champs !";
	}

// Login
}else if(isset($_POST['user'], $_POST['password']) && $_POST['password']){
	$user = $userController->login($_POST['user'], $_POST['password']);
	// $login = $db->login($_POST['user'], $_POST['password']);

	if($user){
		$_SESSION['user'] = $user->getLogin();
	}else{
		$error = "L'utilisateur et/ou le mot de passe est incorrect !";
	}
}


// ----------------------------------------------------------------------------


require_once 'html/header.html';

// User not logged in
if(empty($_SESSION)){
	if(isset($_GET['register'])){
		require_once "html/register.html";
	}else{
		require_once "html/connection.html";
	}
}else{
	$_GET['page'] = isset($_GET['page']) ? $_GET['page'] : "";
	
	/* App routing system */
	switch ($_GET['page']) {
		case 'level':
			echo LevelView::getView();
			break;
		case 'game':
			echo GameView::getView();
			break;
		case 'about':
			require_once "html/about.html";
			break;
		default:
			require_once "html/menu.html";
			break;
	}
}

// For 'Logout' button
if(isset($_SESSION['user'])): ?>
	<div id="logout">
		<form method="post" action="index.php">
			Bonjour, <?= $_SESSION['user'] ?>
			<button type="submit" name="logout" class="btn btn-info btn-sm">
				<i class="fa fa-sign-out"></i>
				Logout
			</button>
		</form>
	</div>
<?php endif;

require_once 'html/footer.html';
