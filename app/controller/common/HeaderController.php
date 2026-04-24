<?php
namespace app\controller\common;
class HeaderController extends \core\Controller{
    public function index(){
        $menu_links = [
            [
                'label' => 'main page',
                'url' => '/ja/projectPHP/dziennik/view/main.php',
            ],
            [
                'label' => 'messages',
                'url' => '/ja/projectPHP/dziennik/view/messages.php',
            ],
            [
                'label' => 'plan lesson',
                'url' => '/ja/projectPHP/dziennik/view/planLessens.php',
            ],
            [
                'label' => 'announcement',
                'url' => '/ja/projectPHP/dziennik/view/ogloszenia.php',
            ],
            [
                'label' => 'attendance',
                'url' => '/ja/projectPHP/dziennik/view/attendance.php',
            ],
            [
                'label' => 'grades',
                'url' => '/ja/projectPHP/dziennik/controllers/grades.php',
            ],
            [
                'label' => 'profile',
                'url' => '/ja/projectPHP/dziennik/view/profile.php',
            ]
        ];
        return $this->load->view("common/header", $menu_links);
    }
}