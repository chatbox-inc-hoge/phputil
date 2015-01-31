<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/31
 * Time: 16:53
 */

namespace Chatbox;



class Input {

    static public function get($key,$default=null){
        return Arr::get($_GET,$key,$default);
    }
    static public function post($key,$default=null){
        return Arr::get($_POST,$key,$default);
    }
    static public function session($key,$default=null){
        return Arr::get($_SESSION,$key,$default);
    }
    static public function cookie($key,$default=null){
        return Arr::get($_COOKIE,$key,$default);
    }
    static public function server($key,$default=null){
        return Arr::get($_SERVER,$key,$default);
    }

} 