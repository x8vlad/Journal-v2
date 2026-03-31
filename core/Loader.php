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

    }

    public function model(){

    }

    public function view(){

    }

//    public function helper(){}

    public function config(){

    }
}