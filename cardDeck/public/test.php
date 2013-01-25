<?php

$rootPath = dirname(dirname(__FILE__));
$libPath = $rootPath . '/library';
$appPath = $rootPath . '/application';

//set_include_path(  );

function __autoload($className)
{

}

/*
$dir = dirname(dirname(__FILE__)) . '/library/Micro/Dao/generated/classes';
//    $conts = readdir( opendir( $dir ) );
//    print_r( $conts );

recurseDir($dir);

function recurseDir($dir)
{
    if ($handle = opendir($dir)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                if (is_dir($dir . "/" . $entry)) {
                    recurseDir($dir . "/" . $entry);
                } else {
                    echo "$entry\n";
                }
            }
        }
        closedir($handle);
    }
}
*/
