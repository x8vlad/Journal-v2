<?php
namespace app\controller\account;
use app\service\RegisterValidator;
use app\model\User;


header('Content-Type: application/json');
session_start();
class Register extends \core\Controller
{

    public function index(){
        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['password_confirm'];
        $role = '';

        if(!empty($login) && !empty($email) && !empty($password) && !empty($confirm_password)){
            if (strpos($email, '_s') !== false) {
                $role = "student";
            } else if (strpos($email, '_t') !== false) {
                $role = "teacher";
            } else if(str_contains($email, 'admin')){
                $role = "admin";
            } else {
                $role = "guest";
            }

            //DI $this->registry
            $userModel = new \app\model\User($this->registry);

            // DI $this->registry
            $RegisterValidatorObj = new \app\service\RegisterValidator($login, $email, $password, $role, $confirm_password);
            $result = $RegisterValidatorObj->signUpUser($userModel);

            switch ($result){
                case "success":
                    echo json_encode(["status" => "success", "msg" => "user has been added"]);
                    break;
                case "empty field":
                    echo json_encode(["status" => "not success, empty fields", "msg" => "empty fields"]);
                    break;
                case "invalid login":
                    echo json_encode(["status" => "not success, invalid login", "msg" => "invalid login"]);
                    break;
                case "invalid email":
                    echo json_encode(["status" => "not success, invalid email", "msg" => "invalid email"]);
                    break;
                case "PwdNotMatch":
                    echo json_encode(["status" => "not success, pass not match", "msg" => "Password not match"]);
                    break;
                case "user taken":
                    echo json_encode(["status" => "not success, user taken", "msg" => "user taken"]);
                    break;
                default:
                    echo json_encode(["status" => "error",  "msg" => "problem with reg:" . $result]);
            }
        } else {
            echo json_encode(
                [
                    "status" => "error",
                    "msg" => "Some field's empty"
                ]
            );
            exit();
        }
    }
}