<?php
namespace Chatbox\Container;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/02
 * Time: 17:28
 */
use Chatbox\Arr;

/**
 * Public Fieldをコンテナ内容として処理するコンテナ。
 * 利用元でpublicに定義がない内容はtoArrayによる配列化で
 * コンテナの中身として扱われない。
 * @package Chatbox\Container
 */
trait PropertyContainerTrait{

    public function setData(array $data){
        foreach($this->toArray() as $key=>$value){
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