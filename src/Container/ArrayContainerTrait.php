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

    protected $fillable;

    public function getItem($key,$default=null){
        return Arr::get($this->_data,$key,$default);
    }

    public function setItem($key,$default=null){
        if(is_array($this->fillable) && !in_array($key,$this->fillable)){
            throw new Exception("cant set value $key");
        }
        Arr::set($this->_data,$key,$default);
    }

    public function setData(array $data){
        foreach($data as $key=>$value){
            if(is_array($this->fillable) && !in_array($key,$this->fillable)){
                continue;
            }
            $this->setItem($key,$value);
        }
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