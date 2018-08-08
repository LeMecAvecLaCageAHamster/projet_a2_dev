<?php 

namespace App\Controller;

class DBController {
	
	private $db_user;
	private $db_password;
	private $pdo;
	private static $instance;

	private function __construct($user, $password){
		$this->db_user = $user;
		$this->db_password = $password;
		$this->pdo = new \PDO('mysql:host=localhost;dbname=betterave;charset=utf8', $user, $password);
	}

	public static function getInstance($user, $password){
		if(self::$instance){
			return self::$instance;
		}else{
			self::$instance = new DBController($user, $password);
			return self::$instance;
		}
	}

	public function getUser($login){

		$query = 'SELECT * FROM users WHERE login = :login';
		$statement = $this->pdo->prepare($query);
		$statement->execute([
						':login' => $login
					]);
		
		return $statement->fetch(\PDO::FETCH_ASSOC);
	}


	/* add user */
	public function addUser($login, $password){

		if(empty($this->getUser($login))){ // if user not already in table

			$password = sha1($password);

			$query = 'INSERT INTO users VALUES (null, :login, :password, 0)';
			$statement = $this->pdo->prepare($query);
			$result = $statement->execute([
				':login' => $login,
				':password' => $password
			]);

			return $statement; // bool
		}

		return false;
	}


	/* check if login infos are corrects */
	public function login($login, $password){
		
		$result = $this->getUser($login);
		
		if(!empty($result)){
			if(sha1($password) == $result['password']){
				return true;
			}
		}

		return false;
	}

}