<?php
namespace Chatbox\Container;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/02
 * Time: 17:28
 */
use Chatbox\Arr;
use Exception;

trait ArrayContainerTrait{

    /**
     * use するスコープ内でprivate
     * @var array
     */
    protected $_data = [];

    protected $readOnly = false;

    protected $fillable;

    public function getItem($key,$default=null){
        return Arr::get($this->_data,$key,$default);
    }

    public function setItem($key,$value){
        if($this->readOnly){
            throw new ArrayContainerException("cant overwrite readonly container");
        }
        if(is_array($this->fillable) && !in_array($key,$this->fillable)){
            throw new ArrayContainerException("cant set value $key");
        }
        Arr::set($this->_data,$key,$value);
    }

    public function setItems(array $data){
        if($this->readOnly) {
            throw new ArrayContainerException("cant overwrite readonly container");
        }

        foreach($data as $key=>$value){
            if(is_array($this->fillable) && !in_array($key,$this->fillable)){
                continue;
            }
            $this->setItem($key,$value);
        }
    }

    public function unsetItem($key){
        unset($this->_data[$key]);
    }

    public function hasItem($key){
        return isset($this->_data[$key]);
    }

    public function countItems(){
        return count($this->_data);
    }


	/**
     * @return array
     */
	public function toArray(){
        return $this->_data;
    }

    ## region deprecated area
    /**
     * @param array $data
     * @deprecated
     * @throws Exception
     */
    public function setData(array $data){
        foreach($data as $key=>$value){
            if(is_array($this->fillable) && !in_array($key,$this->fillable)){
                continue;
            }
            $this->setItem($key,$value);
        }
    }

    /**
     * @deprecated
     */
    public function merge($data){
        if(is_array($data)){
            $this->_data = Arr::merge($this->_data,$data);
        }else{
            throw new \DomainException("ArrayContainerTrait::merge only accept array as argument #0");
        }
    }
    ## endregion

}

class ArrayContainerException extends Exception{}