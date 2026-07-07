<?php
namespace app\controller\messenger;

class MessageController extends \core\Controller
{
    public function index(){
        $option = $_GET['userOption'];
        echo $option;

        $users = $this->load->model("Message");

        $data_for_users_view = $users->allUser();
        $data_for_user_view = $users->certainUser();

        //if all
        $this->render("messenger/message_view", $data_for_users_view);

        // !all
    }
}