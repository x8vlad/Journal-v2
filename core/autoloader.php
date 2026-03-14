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

    $filename = "..\\" . $class . ".php";

//    require_once ($filename);
});

//spl_autoload_register('autoloadingClass');