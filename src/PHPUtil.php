<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/28
 * Time: 2:18
 */

namespace Chatbox;


class PHPUtil {

	public static function value($var)
	{
		return ($var instanceof \Closure) ? $var() : $var;
	}

    static function arr(){
    }


} 