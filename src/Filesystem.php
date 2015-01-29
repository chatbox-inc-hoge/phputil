<?php
/**
 * Created by PhpStorm.
 * User: t.goto
 * Date: 2015/01/29
 * Time: 21:03
 */

namespace Chatbox;


class Filesystem extends \Symfony\Component\Filesystem\Filesystem{

	public function getExt($path){
		return $this->getPathParts($path,"extension");
	}

	public function getFilename($path){
		return $this->getPathParts($path,"filename");
	}

	protected function getPathParts($path,$key){
		$pathParts = pathinfo($path);
		return Arr::get($pathParts,$key,null);
	}
} 