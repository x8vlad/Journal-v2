<?php
namespace app\controller\common;
class HeaderController extends \core\Controller{
    public function index(){
        $menu_links = [
            [
                'label' => 'main page',
                'url' => '/ja/projectPHP/dziennik/view/main.tpl.php',
            ],
            [
                'label' => 'messages',
                'url' => '/ja/projectPHP/dziennik/view/messages.tpl.php',
            ],
            [
                'label' => 'planLessens',
                'url' => '/ja/projectPHP/dziennik/view/planLessens.tpl.php',
            ],
            [
                'label' => 'announcement',
                'url' => '/ja/projectPHP/dziennik/view/ogloszenia.tpl.php',
            ],
            [
                'label' => 'attendance',
                'url' => '/ja/projectPHP/dziennik/view/attendance.tpl.php',
            ],
            [
                'label' => 'Grade',
                'url' => '/ja/projectPHP/dziennik/controllers/grades.php',
            ],
            [
                'label' => 'Profile',
                'url' => '/ja/projectPHP/dziennik/view/profile.tpl.php',
            ]
        ];
        return $this->load->view("common/header", $menu_links);
    }
}