<?php
namespace app\controller\common;
class HeaderController extends \core\Controller{
    public function index(){
        $menu_links = [
            [
                'label' => 'main page',
                'url' => '/auth',
            ],
            [
                'label' => 'messages',
                'url' => '',
            ],
            [
                'label' => 'plan lesson',
                'url' => '/lessons',
            ],
            [
                'label' => 'announcement',
                'url' => '',
            ],
            [
                'label' => 'attendance',
                'url' => '',
            ],
            [
                'label' => 'grades',
                'url' => '',
            ],
            [
                'label' => 'profile',
                'url' => '',
            ]
        ];
        return $this->load->view("common/header", $menu_links);
    }
}