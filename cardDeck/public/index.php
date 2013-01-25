<?php

$rootPath = dirname(dirname(__FILE__));
$libPath = $rootPath . '/library';
$appPath = $rootPath . '/application';

//set_include_path( realpath($appPath . '/source/Model') );
//
//function callModel($className)
//{
//    include ($className . ".php");
//    if (!class_exists($className, false)) {
//        die("Unable to load class: $className");
//    }
//}

require_once $libPath . '/Micro/Loader/Autoloader.php';
$loader = new Micro\Loader\Autoloader('Micro', $libPath);
spl_autoload_register(array($loader, 'loadClass'));
//spl_autoload_register('callModel');

require_once $appPath . '/source/Bootstrap.php';
$bootstrap = new App\Bootstrap($appPath);
$bootstrap->bootstrap()->run();