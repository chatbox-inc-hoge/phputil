<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/26
 * Time: 5:00
 */

namespace Chatbox;


use Symfony\Component\Yaml\Yaml;

class YFM {

//    protected $path;

    protected $yfm;

    protected $document;

    function __construct($path)
    {
        if(file_exists($path) && is_readable($path)){
//            $this->path = $path;
            $this->load($path);
        }else{
            throw new \Exception("cant read file");
        }
    }

    protected function load($path)
    {
        $data = file_get_contents($path);
        $parts = preg_split('#[\n]+[-]{3}[\n]#', $data, 2);
        if (count($parts) === 2) {
            $this->yfm = Yaml::parse($parts[0]);
            $this->document = $parts[1];
        } else {
            $this->document = $data;
        }
    }

    public function getFrontMatter(){
        return $this->yfm;
    }
    public function getDocument(){
        return trim($this->document);
    }




}