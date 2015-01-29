<?php
/**
 * Created by PhpStorm.
 * User: t.goto
 * Date: 2015/01/29
 * Time: 21:32
 */

namespace Chatbox\Config\Loader;

class PHP implements LoaderInterface{

	public function load($existAbsPath)
	{
		$content = file_get_contents($existAbsPath);
		$config =  json_decode($content,true);
		if(is_array($config)){
			return $config;
		}else{
			throw new \Exception("json configuration file must valid json array");
		}
	}

	public function supports()
	{
		return ["JSON"];
	}


} 