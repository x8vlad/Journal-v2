<?php

namespace app\service;
use app\controller\account\Login;
use app\model\User;
class LoginValidator
{
    private $login;
    private $password;
                            // data constructor
    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }
    // methods for checking
    protected function isDataFilled(){
        if(!empty($this->login) && !empty($this->password)){
            return true;
        }
        return false;
    }

    protected function isValidLogin(){
        if(preg_match("/^[a-zA-Z0-9]*$/", $this->login)){
            return true;
        }
        return false;
    }

    // method from model to check
    public function logInUser(User $user){
        if(!$this->isDataFilled()){
             return "empty fields";
        }

        if(!$this->isValidLogin()){
            return "invalid login";
        }

        //return "login success"; ->selectUser retrun true || false
        $result = $user->selectUser($this->login, $this->password);

        if(!$result){
            return "invalid log in";
        }

        return "login success";
    }
}