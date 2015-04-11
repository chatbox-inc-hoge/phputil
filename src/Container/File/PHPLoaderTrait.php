<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/04
 * Time: 10:17
 */
namespace Chatbox\Container\File;

use Chatbox\File;

trait PHPLoaderTrait {

    protected function loadPHP($path){
        $value = include $path;
        return $value;
    }

}