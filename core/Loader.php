<?php
namespace core;

final class Loader{
    protected $registry;

    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    public function controller($route, $method){
        $route = preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$route);
        if(empty($method)){
            $method = "index";
        }
        $class = new $route; // return $class_name; = app\controller\testClass
        //TODO: in future check if this method exist
        return $class->$method;
    }

    public function model($name_model){
        //name_model = TestM
        $name_model = preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$name_model);

        if(!$this->registry->has('model/' . str_replace('/', '-', $name_model))){
            $file = __DIR__ . '/../app/model/' . $name_model . '.php';
            $classModel = 'Model' . preg_replace('/[^a-zA-Z0-9]/', '', $name_model);
            //$classModel = ModelTestM
            if(file_exists($file)){
                include_once($file);
                $model_obj = new $classModel($this->registry);
                $this->registry->set("model".strtolower($classModel), $model_obj);
            }
        }
        return $this->registry->get("model".strtolower($classModel));
    }

    public function view(){

    }

//    public function helper(){}

    public function config(){

    }
}