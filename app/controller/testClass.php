<?php
namespace app\controller;
use core\Controller;

class testClass extends Controller {

    public function show(){
//        echo __FILE__;
//        $uri = "admin://test.com";
//        if(preg_match("#(admin|user)://[a-z0-9]+\.(com|org)#", $uri)){
//            echo "<br>" . "OK";
//        }else{
//            echo "<br>" . "NOT OK";
//        }
    }


    public function index(){
        $this->load->model("TestModel")->testM();

        $data_for_view = [
            'page_title' => 'Test title from a controller!',
            'test_content' => 'Test content from a controller!'
        ];

//      echo $this->load->view("test_view", $data_for_view);
        $this->render("test_view", $data_for_view);
//        var_dump($this->load->model("TestModel"));
    }
}