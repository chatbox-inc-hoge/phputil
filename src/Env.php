<?php
/**
 * Part of the Fuel framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Chatbox;

class Env {

	const PRODUCTION = "production";
	const STAGING = "staging";
	const ALPHA = "ALPHA";
	const DEVELOPMENT = "development";

	static public function host($value,$operation){
		return new static(function($expected){
			return (gethostname() === $expected);
		},$value,$operation);
	}
	static public function value($envKey,$value,$operation){
		return new static(function($expected)use($envKey){
			$data = (php_sapi_name() === "cli-server")?$_ENV:$_SERVER;
			$value = Arr::get($data,$envKey);
			return ($value === $expected);
		},$value,$operation);
	}

	protected $inspecter;

	protected $expected;

	protected $operation;

	/**
	 * @param $inspecter
	 * @param $expected
	 * @param $operation
	 */
	function __construct($inspecter,$expected, $operation)
	{
		$this->inspecter = $inspecter;
		$this->expected = $expected;
		$this->operation = $operation;
	}

	public function run(){
		if(call_user_func($this->inspecter,$this->expected)){
			call_user_func_array($this->operation,func_get_args());
		}
	}



}
