<?php
namespace app\controller\account;

use app\service\LoginValidator;
use app\model\User;

class Login extends \core\Controller
{
    public function login(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $login = $_POST['login'];
        $password = $_POST['password'];

//        return "<br>Login: {$login}<br> password: {$password}";


    }
}