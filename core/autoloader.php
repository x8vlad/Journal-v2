<?php
spl_autoload_register(function ($class){
//    // output: ../core/Application.php
//    echo __DIR__;
//    $path = __DIR__ . "\\" . $class . ".php";
//    echo "path to the file:" . $path;
//    $filename = "../core/{$class}.php";
//    var_dump($class);
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $path = ".." . DIRECTORY_SEPARATOR . $class . ".php";
//    var_dump($path);
    require_once ($path);
});
//function autoloadingClass($class){
//    require_once '..\\' . $class . ".php";
//}
//spl_autoload_register('autoloadingClass');