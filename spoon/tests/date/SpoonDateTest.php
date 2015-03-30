<?php

date_default_timezone_set('Europe/Brussels');

$includePath = dirname(dirname(dirname(dirname(__FILE__))));
set_include_path(get_include_path() . PATH_SEPARATOR . $includePath);

require_once 'spoon/spoon.php';

class SpoonDateTest extends PHPUnit_Framework_TestCase
{
	public function testGetDate()
	{
		$this->assertEquals(date('Y-m-d H:i'), SpoonDate::getDate('Y-m-d H:i'));
		$this->assertEquals(SpoonDate::getDate('l j F Y', mktime(13, 20, 0, 8, 3, 1983)), 'Wednesday 3 August 1983');
	}

	public function testGetTimeAgo()
	{
		$this->assertEquals(SpoonDate::getTimeAgo(time()-60), '1 minute ago');
		$this->assertEquals(SpoonDate::getTimeAgo(time()-(2*60)), '2 minutes ago');
		$this->assertEquals(SpoonDate::getTimeAgo(time()-(60*60)), '1 hour ago');
		$this->assertEquals(SpoonDate::getTimeAgo(time()-(2*60*60)), '2 hours ago');
		$this->assertEquals(SpoonDate::getTimeAgo(time()-(24*60*60)), '1 day ago');
		$this->assertEquals(SpoonDate::getTimeAgo(time()-(2*24*60*60)), '2 days ago');
		$this->assertEquals(SpoonDate::getTimeAgo(time()-(7*24*60*60)), '1 week ago');
		$this->assertEquals(SpoonDate::getTimeAgo(time()-(14*24*60*60)), '2 weeks ago');
	}
}
