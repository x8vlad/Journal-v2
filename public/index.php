<?php
require_once "../core/autoloader.php";

$registry = new \core\Registry();
$loader = new \core\Loader($registry);
$registry->set("load", $loader);


new \core\Application();
$router = new core\Router();
$router->add("", "app\controller\\testClass", "GET");
$router->show();
$class_name = $router->match();
$controller = new $class_name($registry);
$controller->index();
//$test->show();
//$test = new \app\controller\testClass($registry);
//$test->index();