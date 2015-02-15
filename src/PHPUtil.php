<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/28
 * Time: 2:18
 */

namespace Chatbox;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container as CapsuleContainer;

class PHPUtil {

	public static function value($var)
	{
		return ($var instanceof \Closure) ? $var() : $var;
	}

	public static function dataUriToBinary($uri){
		$uri = substr($uri,strpos($uri,",")+1);
		$uri = str_replace(" ","+",$uri);
		return base64_decode($uri);
	}

    static public function bootEloquent($dsn,$asGlobal=true,$bootEloquent=true){
        $config = static::parseEloquentConfig($dsn);
        $capsule = new Capsule;
        $capsule->addConnection($config);

        if($asGlobal){
            $capsule->setAsGlobal();
        }

        if($bootEloquent){
            $capsule->setEventDispatcher(new Dispatcher(new CapsuleContainer));
            $capsule->bootEloquent();
        }
    }

    static protected function parseEloquentConfig($dsn){
        if(is_array($dsn)){
            $config = $dsn + [
                    'driver'    => 'mysql',
                    'host'      => 'localhost',
                    'database'  => 'database',
                    'username'  => 'root',
                    'password'  => 'password',
                    'charset'   => 'utf8',
                    'collation' => 'utf8_unicode_ci',
                    'prefix'    => '',
            ];
        }else{
            if($dsn = parse_url($dsn)){
                if($queryStr = Arr::get($dsn,"query")){
                    $query = [];
                    parse_str($queryStr,$query);
                }else{
                    $query = [];
                }

                if($database = Arr::get($dsn,"path")){
                    $database = substr($database,1);
                }else{
                    $database = "";
                }

                $config = [
                    "driver" => Arr::get($dsn,"scheme"),
                    "host" => Arr::get($dsn,"host"),
                    "database" => $database,
                    "username" => Arr::get($dsn,"user"),
                    "password" => Arr::get($dsn,"pass"),
                    "charset" => Arr::get($query,"charset","utf8"),
                    "collation" => Arr::get($query,"collation","utf8_unicode_ci"),
                    "prefix" => Arr::get($query,"prefix",''),
                ];
            }
        }
        return $config;
    }


} 