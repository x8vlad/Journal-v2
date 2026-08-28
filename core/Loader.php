<?php
namespace core;

final class Loader{
    protected $registry;

    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    public function controller($route, $method){
        $route = preg_replace('#[^a-zA-Z0-9_\\\/]#', '', (string)$route);
        // "app\controller\lesson\LessonController"
        if(empty($method)){
            $method = "index";
        }
        //  = new app\controller\lesson\LessonController
        $class = new $route($this->registry); // return $class_name; = app\controller\testClass
        // $this->registry нужен для того чтоб в контроллер
        // обратистя к свойсву ->load которое доступно только для хранилища
        //TODO: in future check if this method exist

        //        echo "<pre>";
//        var_dump($route);
//        echo "</pre>";
//
//        echo PHP_EOL;
//
//        echo "<pre>";
//        var_dump($method);
//        echo "</pre>";
//
//        echo PHP_EOL;
//        echo "<pre>";
//        var_dump($class);
//        echo "</pre>";
//        die();

        //spl_auto_register из строки "app\controller\lesson\LessonController" превращает в путь  "../app/controller/lesson/LessonController.php"
        // $class = LessonController
        // LessonController->show()
        return $class->$method();
    }

    public function model($name_model){
        //name_model = TestM !!!!
        $name_model = preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$name_model);

        $registry_key = "model".str_replace('/', '-', strtolower($name_model));
        // есть ли в хранилище модель с этим ключом (чтоб в некст раз из ОЗУ его брать) если нет:
        if(!$this->registry->has($registry_key)){
            $file = __DIR__ . '/../app/model/' . $name_model . '.php'; // готовим фул путь и файл модели
//          $class_model = 'Model' . preg_replace('/[^a-zA-Z0-9]/', '', $name_model);
            $class_model = '\\app\\model\\' . str_replace('/', '\\', $name_model);;

            //$class_model = \app\model\testM
            if(file_exists($file)){
                include_once($file); // файл загружается в память RAM
                $model_obj = new $class_model($this->registry); // model_obj = new \app\model\testM (autloader тоже добавялет его в озу)
                $this->registry->set($registry_key, $model_obj);
                // set(modeltestmodel, mdoel_obj)
            }else{return false;}
        }
        return $this->registry->get($registry_key); // $this->data['modeltestmodel']
    }

    public function view($path_view, $data = []){
        $data = (object)$data;
        // app/view/common/header.php
        $file = __DIR__ . '/../app/view/' . $path_view . '.php';
        if(!file_exists($file)){
            echo "404 - NOT FOUND - view method";
            return false;
        }
            //
            ob_start();
            include $file;
            $output_content = ob_get_clean();
            return $output_content;
    }

//    public function helper(){}

    public function config(){
    }
}