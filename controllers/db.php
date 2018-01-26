<?php 

class DB {
	
	private $db_user;
	private $db_password;

	private $pdo;


	function __construct($user, $password){
		$this->db_user = $user;
		$this->db_password = $password;
		$this->pdo = new PDO('mysql:host=localhost;dbname=betterave;charset=utf8', $user, $password);
	}

	public function getUser($login){
		$query = 'SELECT * FROM users WHERE login = :login';
		$statement = $this->pdo->prepare($query);
		$statement->execute([
						':login' => $login
					]);
		
		return $statement->fetch(PDO::FETCH_ASSOC);
	}


	/* ajouter un utilisateur */
	public function addUser($login, $password){

		if(empty($this->getUser($login))){ // si l'utilisateur rentré n'est pas déjà dans la BDD

			$password = sha1($password);

			$query = 'INSERT INTO users VALUES (null, :login, :password, 0)';
			$statement = $this->pdo->prepare($query);
			$statement->execute([
				':login' => $login,
				':password' => $password
			]);

			return $statement; // bool
		}

		return false;
	}


	/* verifie si les informations de connection sont corrects */
	public function login($login, $password){
		
		$result = $this->getUser($login);
		
		if(!empty($result)){ // si le login correspond bien à un compte enregistre
			if(sha1($password) == $result['password']){ // si mdp correct
				return true;
			}
		}

		return false;
	}

}