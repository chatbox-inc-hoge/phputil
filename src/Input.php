<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/31
 * Time: 16:53
 */

namespace Chatbox;



class Input extends Container{

	/**
	 * @param array $source
	 * @return static
	 */
	static public function load($source=[]){
		is_array($source) || ($source = [$source]);

		$ins = new static();
		foreach($source as $type){
			switch($type){
				case "get":
					$ins->httpGet();
					break;
				case "post":
					$ins->httpPost();
					break;
				case "server":
					$ins->httpServer();
					break;
				case "cookie":
					$ins->cookie();
					break;
				case "session":
					$ins->session();
					break;
				case "json":
					$ins->jsonBody();
					break;
				case "env":
					$ins->env();
					break;
			}
		}
		return $ins;
	}

    static public function isMethod($method){
        $method = strtolower($method);
//        var_dump($method,static::server("REQUEST_METHOD"),$_SERVER);
        return strtolower(static::server("REQUEST_METHOD")) === $method;
    }

	/**
	 * @return $this
	 */
	public function httpGet(){
		$this->merge($_GET);return $this;
	}

	/**
	 * @return $this
	 */
	public function httpPost(){
		$this->merge($_POST);return $this;
	}

	/**
	 * @return $this
	 */
	public function session(){
		$this->merge($_SESSION);return $this;
	}

	/**
	 * @return $this
	 */
	public function cookie(){
		$this->merge($_COOKIE);return $this;
	}

	/**
	 * @return $this
	 */
	public function server(){
		$this->merge($_SERVER);return $this;
	}

	/**
	 * @return $this
	 */
	public function env(){
		$this->merge($_ENV);return $this;
	}

	/**
	 * @return $this
	 */
	public function jsonBody(){
		$json = file_get_contents('php://input');
		$json = urldecode($json);
//		var_dump($json);
		$json = trim($json);
//		var_dump($json);
		$json = json_decode($json,true);
//		var_dump($json);
//		exit;
		if(is_array($json)){
			$this->merge($json);return $this;
		}else{
//			var_dump($json);
			throw new \Exception();
		}
	}

}