<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/28
 * Time: 20:15
 */
namespace Chatbox\Traits;

trait Facade {

    /**
     * @return static
     */
    static public function facade(){
        $obj = new static();
        return $obj;
    }
}