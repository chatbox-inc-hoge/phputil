<?php
/**
 * Created by PhpStorm.
 * User: t.goto
 * Date: 2015/02/10
 * Time: 20:31
 */

namespace Chatbox\Chatbox;


use Chatbox\Arr;
use Silex\Application;
use Silex\ServiceProviderInterface;

class Env implements ServiceProviderInterface{

	static $envKey = "MYAPP_ENV";

	public $name;

	function __construct($name)
	{
		$this->name = $name?:$this->detect(static::$envKey,"development");
	}


	protected function get($key,$default=null){
		$source = (php_sapi_name() === "cli-server")?$_ENV:$_SERVER;
		return Arr::get($source,$key,$default);
	}
	/**
	 * Registers services on the given app.
	 *
	 * This method should only be used to configure services and parameters.
	 * It should not get services.
	 *
	 * @param Application $app An Application instance
	 */
	public function register(Application $app)
	{
		$app["env"] = $this;
	}

	protected function setUpConfig(Application $app){
		if($config = $app["config.dir"]){
			!is_array($config) && ($config = [$config]);
			$baseDirs = [];
			foreach($config as $dirPath){
				$baseDirs[] = $dirPath;
				$baseDirs[] = $dirPath.$this->name."/";
			}
		}else{
			throw new Exception("invalid you must set config.dir");
		}

		$app->register(new Config([],$baseDirs));

	}

	/**
	 * Bootstraps the application.
	 *
	 * This method is called after all services are registered
	 * and should be used for "dynamic" configuration (whenever
	 * a service must be requested).
	 */
	public function boot(Application $app)
	{
		//nothing to do
	}


} 