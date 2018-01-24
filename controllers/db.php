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

	/* recuperer tous les utilisateurs */
	public function getUsers(){
		$query = 'SELECT * FROM users';
		return $this->pdo
					->query($query)
					->fetchAll(PDO::FETCH_ASSOC);
	}

	/* ajouter un utilisateur */
	public function addUser($login, $password){
		$password = sha1($password);

		$query = "INSERT INTO users VALUES (null, '" . $login . "', '" . $password . "', 0)";
		return $this->pdo->query($query);
	}


	/* verifie si les informations de connection sont corrects */
	public function login($login, $password){

		foreach ($this->getUsers() as $user) {
			if($login == $user['login']){
				if(sha1($password) == $user['password']){
					return true;
				}
			}
		}

		return false;
	}

}