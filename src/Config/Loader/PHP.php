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
		$config = include $existAbsPath;
		if(is_array($config)){
			return $config;
		}else{
			throw new \Exception("php configuration file must return array");
		}
	}

	public function supports()
	{
		return ["PHP"];
	}


} 