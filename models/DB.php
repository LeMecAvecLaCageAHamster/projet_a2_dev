<?php 

namespace App\Model;

class DB {
	private $db_user;
	private $db_password;
	private $pdo;
	private static $instance;

	private function __construct($user, $password){
		$this->db_user = $user;
		$this->db_password = $password;
		$this->pdo = new \PDO('mysql:host=localhost;dbname=betterave;charset=utf8', $user, $password);
	}

	public static function getInstance($user='root', $password='root'){
		if(self::$instance){
			return self::$instance->pdo;
		}else{
			self::$instance = new DB($user, $password);
			return self::$instance->pdo;
		}
	}
}