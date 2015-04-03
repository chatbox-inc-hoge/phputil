<?php
namespace Chatbox\Container;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/02
 * Time: 17:28
 */
use Chatbox\Arr;

trait ArrayContainerTrait{

    protected $_data = [];

    public function getItem($key,$default=null){
        return Arr::get($this->_data,$key,$default);
    }

    public function setItem($key,$default=null){
        Arr::set($this->_data,$key,$default);
    }

	public function merge($data){
        if(is_array($data)){
            $this->_data = Arr::merge($this->_data,$data);
        }else{
            throw new \DomainException("ArrayContainerTrait::merge only accept array as argument #0");
        }
    }
	/**
     * @return array
     */
	public function toArray(){
        return $this->_data;
    }

}