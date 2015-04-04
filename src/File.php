<?php
/**
 * Created by PhpStorm.
 * User: t.goto
 * Date: 2015/01/29
 * Time: 21:03
 */

namespace Chatbox;
use Chatbox\Traits\Facade;

/**
 * Class Filesystem
 * @package Chatbox
 *
 */
class File{

    use Facade;

    public static function __callStatic($name, $arguments)
    {
        $obj = new static();
        return call_user_func_array([$obj,$name],$arguments);
    }

    /**
     * @param $filePath
     * @return string
     * @throws FileNotFoundException
     */
    public function load($filePath){
        if(file_exists($filePath) && is_readable($filePath)){
            return file_get_contents($filePath);
        }else{
            throw new FileNotFoundException;
        }
    }


    public function getExt($path){
		return $this->getPathParts($path,"extension");
	}

    public function getFilename($path){
		return $this->getPathParts($path,"filename");
	}

    protected function getPathParts($path,$key){
		$pathParts = pathinfo($path);
		return Arr::get($pathParts,$key,null);
	}

}

class FileNotFoundException extends \Exception{}