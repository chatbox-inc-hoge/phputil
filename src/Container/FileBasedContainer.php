<?php
/**
 * Created by PhpStorm.
 * User: t.goto
 * Date: 2015/01/29
 * Time: 20:33
 */

namespace Chatbox\Container;

use Chatbox\Container\ArrayContainer;
use Chatbox\File;

use Chatbox\Container\File\PHPLoaderTrait;
use Chatbox\Container\File\YAMLLoaderTrait;
use Chatbox\Container\File\JSONLoaderTrait;

class FileBasedContainer extends ArrayContainer{

    use PHPLoaderTrait,YAMLLoaderTrait,JSONLoaderTrait;

    public function load($path)
    {
        $ext = File::facade()->getExt($path);
        $ext = strtoupper($ext);
        $callable = [$this, "load$ext"];
        if (is_callable($callable)) {
            $data = call_user_func($callable, $path);
            $this->setItems($data);
        } else {
            throw new \Exception("unsupported format: $ext");
        }
    }
} 