<?php

namespace App\Model;

class User{
    private $login;
    private $password;
    private $score;
    private $level;
    private $admin;

    function __construct($login, $password){
        $this->login = $login;
        $this->password = $password;
    }

    function getLogin(){
        return $this->login;
    }
    function getPassword(){
        return $this->password;
    }
}