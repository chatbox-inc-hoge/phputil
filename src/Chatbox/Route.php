<?php
/**
 * Created by PhpStorm.
 * User: t.goto
 * Date: 2015/02/10
 * Time: 19:50
 */

namespace Chatbox\Chatbox;


use Silex\ControllerCollection;

class Route {

	protected $name;

	function __construct($name=null)
	{
		$this->name = $name;
	}


	public function getName(){
		return $this->name;
	}

	public function controllerFactory(ControllerCollection $collection){
		throw new \Exception("you must implement this");

	}

} 