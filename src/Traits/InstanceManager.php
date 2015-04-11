<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/28
 * Time: 20:15
 */
namespace Chatbox\Traits;

use Chatbox\Arr;

trait InstanceManager {

    static protected $instances = [];

    /**
     * @param $obj
     * @param string $name
     */
    static public function setInstance($obj,$name="active"){
        static::$instances[$name] = $obj;
    }

    /**
     * @param string $name
     * @return static
     * @throws \DomainException
     */
    static public function getInstance($name="active"){
        if(isset(static::$instances[$name])){
            return static::$instances[$name];
        }else{
            throw new \DomainException("");
        }
    }

    public function setGlobal($name="active"){
        static::setInstance($this,$name);
    }
}