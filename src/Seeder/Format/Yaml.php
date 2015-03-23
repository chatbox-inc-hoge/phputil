<?php
namespace Chatbox\Seeder\Format;

use Symfony\Component\Yaml\Yaml as YamlParser;
/**
 * Created by PhpStorm.
 * User: t.goto
 * Date: 2015/03/24
 * Time: 13:20
 */

class Yaml extends File{

	public function loadFile($filepath){
		$data = parent::$rawInput;
		$data = YamlParser::parse($data);
		return $data;
	}


}