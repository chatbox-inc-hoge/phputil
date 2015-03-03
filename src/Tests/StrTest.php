<?php
namespace Chatbox\Tests;

use PHPUnit_Framework_TestCase;
use Chatbox\Str;
/**
 * PHPUnit test case for the util.php library
 *
 * @since   1.0.000
 */
class StrTest extends PHPUnit_Framework_TestCase
{
	public function test_random_default()
	{
        $pool = [];

        for($i=0;$i<10000;$i++){
            $pool[] = Str::random(16);
        }
		$this->assertEquals( count($pool), count(array_unique($pool)) );
	}

}
