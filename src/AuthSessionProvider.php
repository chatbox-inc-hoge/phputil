<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/19
 * Time: 17:26
 */

namespace Kbec;

/**
 *
 * @package Wap
 */
class AuthSessionProvider {

    static public $authKey = "kbecAuth";

    static public function native(){
        $onGet = function($key,$default){
            if(isset($_SESSION[$key])){
                return $_SESSION[$key];
            }else{
                return $default;
            }
        };
        $onSet = function($key,$value){
            $_SESSION[$key] = $value;
        };
        $onRefresh = function(){
            session_regenerate_id(true);
        };

        return new static($onGet,$onSet,$onRefresh);
    }

    protected $onGet;

    protected $onSet;

    protected $onRefresh;

    function __construct($onGet, $onSet,$onRefresh)
    {
        $this->onGet = $onGet;
        $this->onRefresh = $onRefresh;
        $this->onSet = $onSet;
    }

    public function get($default=null){
        call_user_func($this->onGet,static::$authKey,$default);
    }
    public function set($default){
        call_user_func($this->onSet,static::$authKey,$default);
    }
    public function refresh(){
        call_user_func($this->refresh);
    }
}