<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/04
 * Time: 10:17
 */

use Chatbox\File;

trait PHPLoaderTrait {

    protected function loadJSON($path){
        $content = File::facade()->load($path);
        $config =  json_decode($content,true);
        if(is_array($config)){
            return $config;
        }else{
            throw new \Exception("json configuration file must valid json array");
        }
    }

}