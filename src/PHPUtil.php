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

	public static function dataUriToBinary($uri){
		$uri = substr($uri,strpos($uri,",")+1);
		$uri = str_replace(" ","+",$uri);
		return base64_decode($uri);

	}


} 