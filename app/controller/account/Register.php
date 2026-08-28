<?php
namespace app\controller\account;
use app\service\RegisterValidator;
use app\model\User;


//header('Content-Type: application/json');

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
//                    echo json_encode(["status" => "success", "message" => "user has been added"]);
                    $this->helper->renderAlert("success", "user has been added");
                    header('HX-Trigger: resetRegisterForm');
                    break;
                case "empty field":
                    $this->helper->renderAlert("warning", "empty fields");
                    break;
                case "invalid login":
                    $this->helper->renderAlert("warning", "invalid login");
                    break;
                case "invalid email":
                    $this->helper->renderAlert("warning", "invalid email");
                    break;
                case "PwdNotMatch":
                    $this->helper->renderAlert("warning", "Password not match");
                    break;
                case "user taken":
                    $this->helper->renderAlert("danger, user taken", "user taken");
                    break;
                default:
                    $this->helper->renderAlert("danger", "problem with reg:" . $result);
            }
        } else {
            $this->helper->renderAlert("danger", "Some field's empty");
            exit();
        }
    }
}