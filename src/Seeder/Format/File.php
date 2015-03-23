<?php
namespace Chatbox\Seeder\Format;


/**
 * Created by PhpStorm.
 * User: t.goto
 * Date: 2015/03/24
 * Time: 13:20
 */

trait FileLoaderTrait{

	protected $rawInput;

//	function __construct($param)
//	{
//		if(is_string($param)){
// 			$this->rawInput = $this->loadFile($param);
//		}else if(is_array($param)){
//			$this->rawInput = $param;
//		}else{
//			throw new \DomainException("unsupported argument supplied");
//		}
//	}

	public function loadFile($filepath){
		if(file_exists($filepath) && is_readable($filepath)){
			return file_get_contents($filepath);
		}else{
			throw new \RuntimeException("file not found: $filepath");
		}

	}


}