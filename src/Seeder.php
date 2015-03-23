<?php
/**
 * Created by PhpStorm.
 * User: t.goto
 * Date: 2015/03/24
 * Time: 13:54
 */

namespace Chatbox;

use Chatbox\Seeder\Format\SeederFormatInterface;
use Chatbox\Arr;
use Chatbox\PHPUtil;

class Seeder {

	static public function getDefaultFormatMap(){
		return [
		];
	}

	static public function forge($configPath){
		$configArr = include $configPath;
		if(is_array($configArr)){
			$formatMap = static::getDefaultFormatMap();
			if($customMap = Arr::get($configArr,"format")){
				$formatMap = array_merge($formatMap,$customMap);
				unset($configArr["format"]);
			}
			$pool = [];
			foreach($configArr as $formatName => $values){
				$className = Arr::get($formatMap,$formatName);
				if($className && ($format = new $className) && $format instanceof SeederFormatInterface){
					foreach($values as $key=>$value){
						$pool[] = $format->factory($value,$key);
					}
				}else{
					throw new \RuntimeException("invalid format supplied: $formatName => $className");
				}
			}
			return new static($pool);
		}else{
			throw new \DomainException();
		}

	}


	/**
	 * @var SeederFormatInterface[]
	 */
	protected $seedFormats = [];

	public function __construct($seeds = [])
	{
		$this->seedFormats = $seeds;
	}

	public function insert($cb){
		PHPUtil::getEloquent()->beginTransaction();
		foreach($this->seedFormats as $format){
//			各フォーマットオブジェクトを操作する
			foreach($format->getTableNames() as $tableName){
				if($cb($format) !== false){
					$rows = $format->getRows($tableName);
					PHPUtil::getEloquent()->table($tableName)->insert($rows);
				}else{
					throw new \Exception("callback return false. seed interupted");
				}
			}
		}
		PHPUtil::getEloquent()->commit();
	}

}























