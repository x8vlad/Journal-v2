<?php

namespace app\controller\announcement;

use app\model\announcement\Announcement;
use core\Controller;

class AnnouncementController extends Controller
{
    public function index(){
        // TODO: chech how process of naming model not modelNameModel just modelName
        $announcements = $this->load->model("announcement/Announcement")->getAnnouncements();
        $data_for_announcement_view = [
            'announcements' => $announcements
            // ->getAnnouncements()
        ];
        $this->render('announcement/announcement_view', $data_for_announcement_view);
    }

    public function addAnnouncement_() {
        $title = $_POST['title']?? null;
        $content = $_POST['content'] ?? null;

       $this->load->model("announcement/Announcement")->addAnnouncement($title, $content);
       header("Location: /announcement");
       exit();
    }
    // editAnnouncementView ($announcement_id)
    public function add() {
        echo "hi from add method";
    }

}