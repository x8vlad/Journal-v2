<?php
require_once "../core/autoloader.php";

$registry = new \core\Registry();
$loader = new \core\Loader($registry);
$registry->set("load", $loader);
$db = new \core\Dbh($registry);
$registry->set("db", $db);


//new \core\Application();
$router = new core\Router();
//rules uri detect which controller need to use
//$router->get("", "app\\controller\\testClass");
$router->get("auth", "app\\controller\\account\\Auth");


$class_name = $router->match();
// class_name = app\controller\\testClass
//$router->show();
//class name app\controller\\testClass
// new app\controller\\testClass BUT php doesnt know about this class so thanks aultoaeer he require this class

//$controller = new $class_name($registry);
//$controller->index();
// app\controller\testClass == testClass
$loader->controller($class_name, "");
//$test->show();
//$test = new \app\controller\testClass($registry);
//$test->index();