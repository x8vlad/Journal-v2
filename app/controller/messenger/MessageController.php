<?php
namespace app\controller\messenger;

class MessageController extends \core\Controller
{
    public function message(){

        $option = $_GET['userOption'];
//        echo $option;
//        die();
        $users = $this->load->model("messenger/Message");

        $data_for_users = $users->allUser();
//        echo "<br>";
//        echo "<pre>";
//        var_dump($data_for_users);
//        echo "<pre>";
//        die;

        $data_for_users_view = [
            'data_for_users' => $data_for_users,
        ];


        $this->render("messenger/message_view", $data_for_users_view);
        // !all
    }
}