<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/04
 * Time: 10:17
 */
namespace Chatbox\Container\File;

use Chatbox\File;

trait YAMLLoaderTrait {

    protected function loadYAML($path){
        $content = File::facade()->load($path);
        $config =  \Symfony\Component\Yaml\Yaml::parse($content);
        if(is_array($config)){
            return $config;
        }else{
            throw new \Exception("yaml configuration file must return valid yaml");
        }
    }

}