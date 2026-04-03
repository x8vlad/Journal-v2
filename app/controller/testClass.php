<?php
namespace app\controller;
class testClass {

    public function show(){
//        echo __FILE__;
//        $uri = "admin://test.com";
//        if(preg_match("#(admin|user)://[a-z0-9]+\.(com|org)#", $uri)){
//            echo "<br>" . "OK";
//        }else{
//            echo "<br>" . "NOT OK";
//        }
    }

    public function __construct()
    {
        echo "all work;";
        echo __FILE__ . "<br>";
    }

    public function index(){

    }
}