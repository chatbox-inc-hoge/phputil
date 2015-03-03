<?php
namespace Chatbox\Tests\Tratis;

use PHPUnit_Framework_TestCase;
use Chatbox\Traits\SimpleContainer;

class Sample implements \ArrayAccess,\Countable,\JsonSerializable,\IteratorAggregate{
    use SimpleContainer;

    function __construct(array $data = [])
    {
        $this->data = $data;
    }
}

/**
 * PHPUnit test case for the util.php library
 *
 * @since   1.0.000
 */
class SimpleContainerTest extends PHPUnit_Framework_TestCase
{
	public function test_basic()
	{
        $sample = new Sample([
            "name" => "Tom"
        ]);

		$this->assertEquals( "Tom", $sample["name"] );
	}

}
