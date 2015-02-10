<?php
/**
 * Created by PhpStorm.
 * User: t.goto
 * Date: 2015/01/29
 * Time: 20:50
 */

namespace Chatbox\Config;


use \Chatbox\Arr;
use \Chatbox\Container;
use \Chatbox\Filesystem;

use \Symfony\Component\Config\FileLocator;

class Config extends Container{

	/**
	 * @param arary $default
	 * @return Config
	 */
	public static function forge(array $default=[],array $dir=[],array $loaders=null){
		is_null($loaders) && ($loaders = static::getDefaultLoaders());
		$obj = new static($default);
		foreach($dir as $d){
			$obj->addDir($d);
		}
		foreach($loaders as $l){
			$obj->addLoader($l);
		}
		return $obj;
	}

	public static function getDefaultLoaders(){
		return [
			new Loader\PHP(),
			new Loader\JSON(),
			new Loader\YAML(),
		];
	}

	protected $baseDirs = [];
	protected $loaders = [];

	public function addLoader(Loader\LoaderInterface $loader){
		foreach($loader->supports() as $type){
			$this->loaders[$type] = $loader;
		}
		return $this;
	}

	public function addDir($path){
		if(is_dir($path)){
			$this->baseDirs[] = $path;
		}else{
			throw new \Exception("invalid directory");
		}
		return $this;
	}

	public function load($path){
		$existAbsPathes = $this->detectFilePath($path);
		foreach($existAbsPathes as $existAbsPath){
			$this->loadFileFromExistAbsolutePath($existAbsPath);
		}
		return $this;
	}
	protected function loadFileFromExistAbsolutePath($existAbsPath){
		$fs = new Filesystem();
		$ext = $fs->getExt($existAbsPath);

		if(($loader = Arr::get($this->loaders,strtoupper($ext),false))
			&& ($loader instanceof Loader\LoaderInterface)){
			$arr = $loader->load($existAbsPath);
		}else{
			throw new \Exception("no valid loader found for $ext");
		}
		$this->merge($arr);
	}

	protected function detectFilePath($path,$currentPath = null, $first = true){
		$fs = new Filesystem();
		if($fs->isAbsolutePath($path)){
			if(file_exists($path)){
				return [$path];
			}else{
				throw new \Exception("file not found $path");
			}
		}else{
			$loc = new FileLocator($this->baseDirs);
			$pathes = $loc->locate($path,$currentPath,$first);
			return (array)$pathes; // FIXME ここちゃんと引数無効にして、引数で分岐してキャストする。
		}
	}






}