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



        if(!empty($login) && !empty($password)){
            $user = new User($this->registry);

            $LoginValidatorObj = new LoginValidator($login, $password);
            $result = $LoginValidatorObj->logInUser($user);

            switch ($result) {
                case "login success":
                    $this->helper->renderAlert("success", "Login as: {$login}");
                    break;
                case "empty fields":
                    $this->helper->renderAlert("warning", "Empty fields");
                    break;
                case "invalid login":
                    $this->helper->renderAlert("danger", "invalid login");
                    break;
            }
        }
    }
}