<?php
// output: ../core/Application.php
//string(11) "Application"
spl_autoload_register(function ($class){
//    echo __DIR__;
//    $path = __DIR__ . "\\" . $class . ".php";
//    echo "path to the file:" . $path;
//    $filename = "../core/{$class}.php";
//    var_dump($class);

    $filename = "..\\" . $class . ".php";

//    echo $filename;
    require_once ($filename);
});