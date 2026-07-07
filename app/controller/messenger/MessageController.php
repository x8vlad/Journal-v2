<?php
namespace app\controller\messenger;

class MessageController extends \core\Controller
{
    public function index(){

        $option = $_GET['userOption'];
//        echo $option;

        $users = $this->load->model("messenger/Message");

        $data_for_users = $users->allUser();
//        echo "<br>";
//        echo "<pre>";
//        var_dump($data_for_users);
//        echo "<pre>";
//        die;

        $data_for_user = $users->certainUser($option);

        $data_for_users_view = [
            'data_for_users' => $data_for_users,
        ];

//        $data_for_user_view = [
//            '$data_for_user' => $data_for_user,
//        ];


        //if all
        if($option == "*"){
//            $result = all users
        }else{

        }
        /* @var object $result */
        $this->render("messenger/message_view", $result);
        // !all
    }
}