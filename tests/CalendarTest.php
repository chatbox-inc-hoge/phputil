<?php

//date_default_timezone_set('UTC');
//
//require_once dirname(__FILE__) . '/../util.php';
//

use \Carbon\Carbon;

/**
 * PHPUnit test case for the util.php library
 *
 * @since   1.0.000
 */
class CalendarTest extends PHPUnit_Framework_TestCase
{
	public function test_start_sunday()
	{
        $cal = new \Chatbox\Calendar(2015,02);
        $carbons = $cal->getCarbons(false);

		$this->assertEquals( '28', count($carbons) );
		$this->assertEquals( Carbon::create(2015,02,01)->startOfDay()->timestamp, reset($carbons)->timestamp );
		$this->assertEquals( Carbon::create(2015,02,28)->startOfDay()->timestamp, end($carbons)->timestamp );
	}
	public function test_start_monday()
	{
        $cal = new \Chatbox\Calendar(2015,02);
        $cal->leftHandWeekDay(Carbon::MONDAY);
        $carbons = $cal->getCarbons(false);

//		$this->assertEquals( '35', count($carbons) );
		$this->assertEquals( Carbon::create(2015,01,26)->startOfDay()->timestamp, reset($carbons)->timestamp );
		$this->assertEquals( Carbon::create(2015,03,01)->startOfDay()->timestamp, end($carbons)->timestamp );
	}

}
