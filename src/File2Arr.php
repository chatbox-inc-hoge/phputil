<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/26
 * Time: 4:34
 */

namespace Chatbox;


use Symfony\Component\Yaml\Yaml;

class File2Arr {

    protected $path;

    function __construct($path)
    {
        if(file_exists($path) && is_readable($path)){
            $this->path = $path;
        }else{
            throw new \Exception("cant read file");
        }
    }

    public function yaml(){
        $data = file_get_contents($this->path);
        $arr = Yaml::parse($data);
        if(is_array($arr)){
            return $arr;
        }else{
            throw new \Exception("fail to parse");
        }
    }
    public function php(){
        $arr = include $this->path;
        if(is_array($arr)){
            return $arr;
        }else{
            throw new \Exception("fail to parse");
        }
    }
    public function json(){
        $data = file_get_contents($this->path);
        $arr = json_decode($data,true);
        if(is_array($arr)){
            return $arr;
        }else{
            throw new \Exception("fail to parse");
        }
    }


}