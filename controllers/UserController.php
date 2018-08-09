<?php 

namespace App\Controller;

use App\Model\DB;
use App\Model\User;

class UserController{

	public function getUser($login){

		$query = 'SELECT * FROM users WHERE login = :login';
		$statement = DB::getInstance()->prepare($query);
		$statement->execute([
						':login' => $login
					]);
		
		return $statement->fetch(\PDO::FETCH_ASSOC);
	}

	/* add user */
	public function addUser($login, $password){

		if(empty($this->getUser($login))){ // if user not already in table

			$password = sha1($password);

			$query = 'INSERT INTO users VALUES (null, :login, :password, 0, 0, 0)';
			$statement = DB::getInstance()->prepare($query);
			$result = $statement->execute([
				':login' => $login,
				':password' => $password
			]);

			return $result; // bool
		}

		return false;
	}

	/* check if login infos are corrects */
	public function login($login, $password){
		
		$result = $this->getUser($login);
		
		if(!empty($result)){
			if(sha1($password) == $result['password']){
				return new User($login, $password);
			}
		}

		return false;
	}

}