<?php
namespace app\controller;
class testClass {

    public function show(){
        echo __FILE__;
    }

    public function __construct()
    {
        echo __FILE__ . "<br>";
    }
}