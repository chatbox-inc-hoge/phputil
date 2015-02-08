<?php
/**
 * Created by PhpStorm.
 * User: t.goto
 * Date: 2015/02/10
 * Time: 18:51
 */

namespace Chatbox;

use Chatbox\Chatbox\Env;
use Chatbox\Chatbox\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Application
 * TODO silexを依存に入れる
 *
 * Controller 周りはmauntが便利
 * http://silex.sensiolabs.org/doc/providers.html#controller-providers
 * @package Chatbox\Chatbox
 */
class Application{

	protected $active;

	static function init($env){

	}

	static function active(){
		return static::$active;
	}

	/**
	 * @var \Silex\Application
	 */
	protected $app;

	public function __construct(array $value = [])
	{
		$app = new \Silex\Application($value);
		$app->register(new Env());
		$this->app = $app;
	}

	public function configure(){
		$this->app["config.baseDir"] = [];

	}

	public function run(Request $request=null){
		$this->configure();
		$this->app->run($request);

	}

} 