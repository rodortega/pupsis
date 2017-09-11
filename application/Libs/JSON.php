<?php

namespace Mini\Libs;

class JSON
{
	public function send($json)
	{
		header('Content-Type: application/json');
		echo json_encode($json);
	}
}