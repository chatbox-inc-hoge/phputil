<?php
namespace Chatbox\Tests;
//date_default_timezone_set('UTC');
//
//require_once dirname(__FILE__) . '/../util.php';
//
use PHPUnit_Framework_TestCase;
/**
 * PHPUnit test case for the util.php library
 *
 * @since   1.0.000
 */
class ArrTest extends PHPUnit_Framework_TestCase
{
	public function test_array_get()
	{

		$sample = [
			"name" => "tom",
			"age" => "16",
			"like" => [
				"apple","banana","lemon"
			],
			"family" => [
				"mary" => [
					"age" => "14"
				]
			]
		];
		$this->assertEquals( 'tom', \Chatbox\Arr::get($sample,"name") );
	}

}
