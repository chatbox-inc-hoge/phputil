<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/28
 * Time: 7:37
 */

namespace Chatbox;


class Str {

    static protected $loremCache = [];

    static public function random($length=7,$table="default"){
        if(!is_array($table)){
            $table = static::getRandomTable($table);
            if(!is_array($table) || !count($table)){
                throw new \RuntimeException("Invalid table supplied");
            }
        }
        $pool = "";
        for($i=0;$i<$length;$i++){
            $pool .= array_rand($table);
        }
        return $pool;
    }

    static protected function getRandomTable($tableName){
        $pool = "";
        switch($tableName){
            case 'alpha':
                $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;

            default:
            case 'alnum':
                $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;

            case 'numeric':
                $pool = '0123456789';
                break;

            case 'nozero':
                $pool = '123456789';
                break;

            case 'distinct':
                $pool = '2345679ACDEFHJKLMNPRSTUVWXYZ';
                break;

            case 'hexdec':
                $pool = '0123456789abcdef';
                break;
            default:
                break;
        }
        return str_split($pool);
	}

    static public function lorem($type){
        $loremTable = static::getLoremCache($type);
        return array_rand($loremTable);
    }

    static protected function getLoremCache($type){
        if(!in_array($type,["short","medium","long"])){
            throw new \Exception("invalid type argument supplied");
        }
        if(!Arr::get(static::$loremCache,$type)){
            $url = "http://loripsum.net/api/100/$type/headers/plaintext";
            $content = file_get_contents($url);
            $content = array_filter(explode($content,"\n"));
            static::$loremCache[$type] = $content;
        }
        return Arr::get(static::$loremCache,$type,[]);
    }


} 