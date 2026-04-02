<?php
namespace core;

final class Loader{
    protected $registry;

    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    public function controller($route, $data = array()){
        // clear path
//        $route = preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$route);
//        $class_name = str_replace('/', '\\', $route);
//        new $class_name;
    }

    public function model(){

    }

    public function view(){

    }

//    public function helper(){}

    public function config(){

    }
}