<?php
/**
 * Created by PhpStorm.
 * User: t.goto
 * Date: 2015/01/29
 * Time: 21:32
 */

namespace Chatbox\Config\Loader;

class YAML implements LoaderInterface{

	public function load($existAbsPath)
	{
		$content = file_get_contents($existAbsPath);
		$config =  \Symfony\Component\Yaml\Yaml::parse($content);
		if(is_array($config)){
			return $config;
		}else{
			throw new \Exception("yaml configuration file must return valid yaml");
		}
	}

	public function supports()
	{
		return ["YML","YAML"];
	}


} 