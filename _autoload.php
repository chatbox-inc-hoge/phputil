<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 15:43
 */

$tryPath = [
    __DIR__."/vendor/autoload.php",
    __DIR__."/../../autoload.php",
];

foreach($tryPath as $path){
    if(file_exists($path)){
        $obj = require $path;
        if($obj instanceof \Composer\Autoload\ClassLoader){
            return;
        }else{
            throw new Exception("non-composer autoloader file included. $path");
        }
    }
}

throw new Exception("cant find autoload file");