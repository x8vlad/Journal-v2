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
        return $class->$method();
    }

    public function model($name_model){
        //name_model = TestM
        $name_model = preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$name_model);

        $registry_key = "model_".str_replace('/', '-', strtolower($name_model));

        if(!$this->registry->has($registry_key)){
            $file = __DIR__ . '/../app/model/' . $name_model . '.php';
            $class_model = 'Model' . preg_replace('/[^a-zA-Z0-9]/', '', $name_model);
            //$class_model = ModelTestModel
            if(file_exists($file)){
                include_once($file);
                $model_obj = new $class_model($this->registry);
                $this->registry->set($registry_key, $model_obj);
            }else{return false;}
        }
        return $this->registry->get($registry_key);
    }

    public function view(){

    }

//    public function helper(){}

    public function config(){

    }
}