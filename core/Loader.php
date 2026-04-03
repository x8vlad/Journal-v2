<?php
namespace core;

final class Loader{
    protected $registry;

    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    public function controller($route, $method){
        if(empty($method)){
            $method = "index";
        }
        $class = new $route; // return $class_name; = app\controller\testClass
        //TODO: in future check if this method exist
        return $class->$method;
    }

    public function model(){

    }

    public function view(){

    }

//    public function helper(){}

    public function config(){

    }
}