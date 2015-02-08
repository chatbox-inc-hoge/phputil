<?php
/**
 * Created by PhpStorm.
 * User: t.goto
 * Date: 2015/02/10
 * Time: 21:01
 */

namespace Chatbox\Chatbox;


use Silex\Application;
use Silex\ServiceProviderInterface;

class Config extends \Chatbox\Config\Config implements ServiceProviderInterface{



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
		$this->load("config");
		$app["config"] = $this;
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
		// TODO: Implement boot() method.
	}


} 