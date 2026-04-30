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

            $userModel = new \app\model\User($this->registry);
            $exists = $userModel->isUserExists($login, $email);

            $RegisterValidatorObj = new \app\service\RegisterValidator($this->registry,$login, $email, $password, $role, $confirm_password);
            $result = $RegisterValidatorObj->signUpUser();
            if ($result == "success") {

                echo json_encode(["status" => "success"]);
            } else {
                echo json_encode(
                    [
                        "status" => "error",
                        "msg" => "problem with reg:" . $result
                    ]
                );
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