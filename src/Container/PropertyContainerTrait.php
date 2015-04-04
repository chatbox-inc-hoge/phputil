<?php
namespace Chatbox\Container;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/02
 * Time: 17:28
 */
use Chatbox\Arr;

trait PropertyContainerTrait{

    public function setData(array $data){
        foreach($this as $key=>$value){
            if($value = Arr::get($data,$key)){
                $this->{$key} = $value;
            }
        }
    }

	/**
     * @return array
     */
	public function toArray(){
        return call_user_func('get_object_vars',$this);
    }

}