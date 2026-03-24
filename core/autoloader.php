<?php
// output: ../core/Application.php
//string(11) "Application"

//function autoloadingClass($class){
//    require_once '..\\' . $class . ".php";
//}
spl_autoload_register(function ($class){
//    echo __DIR__;
//    $path = __DIR__ . "\\" . $class . ".php";
//    echo "path to the file:" . $path;
//    $filename = "../core/{$class}.php";
//    var_dump($class);

    $path = "..\\" . $class . ".php";

    require_once ($path);
});

//spl_autoload_register('autoloadingClass');