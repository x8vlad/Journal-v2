<?php
require_once "../core/autoloader.php";

new \core\Application();
$test = new \app\controller\testClass();
new core\Registry();
$router = new core\Router();
$router->add("", "app\controller\\testClass.php", "GET");
$router->show();
$router->match();

$test->show();