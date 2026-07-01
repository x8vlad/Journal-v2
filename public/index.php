<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "index.php lauch" . PHP_EOL;
require_once "../core/autoloader.php";
echo "autloader.php lauch" . PHP_EOL;
$registry = new \core\Registry();
$loader = new \core\Loader($registry);
$registry->set("load", $loader);
$db = new \core\Dbh($registry);
$registry->set("db", $db);


//new \core\Application();
$router = new core\Router();
//rules uri detect which controller need to use
//$router->get("", "app\\controller\\testClass");

// ! namesapce ever seperating via slash, so this line can distract the PHP and he can mean app / is a namespace not a directoty

$router->get("auth", "app\\controller\\account\\Auth");
$router->get("", "app\\controller\\testClass"); // main page with resource "/"
$router->post("auth", "app\\controller\\account\\Register");

$router->get("lessons", "app\\controller\\lesson\\LessonController"); // main page with resource "/"



$class_name = $router->match();
// class_name = app\controller\\testClass
//$router->show();
//class name app\controller\\testClass
// new app\controller\\testClass BUT php doesnt know about this class so thanks aultoaeer he require this class

//$controller = new $class_name($registry);
//$controller->index();
// app\controller\testClass == testClass
//HERE WRITE METHOD MAN
$loader->controller($class_name, "");
//$test->show();
//$test = new \app\controller\testClass($registry);
//$test->index();