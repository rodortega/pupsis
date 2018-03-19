<?php
namespace Mini\Controller;

class TestController
{
	public function index()
	{
		$time = strtotime("08:00:00");
		$time2 = strtotime("08:01:00");

		echo $time2 - $time;
	}
}
