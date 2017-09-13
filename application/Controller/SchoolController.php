<?php
namespace Mini\Controller;

use Mini\Model\School;

use Mini\Libs\JSON;

class SchoolController
{
	public function add()
	{
		$School = new School();
		$schools = $School->addSchool($_POST);

		if ($schools > 0)
		{
			$status = "success";
		}
		else
		{
			$status = "error";
		}

		$data = array
		(
			"status" => $status
		);

		$JSON = new JSON();
		$JSON->send($data);
	}

	public function edit()
	{
		$School = new School();
		$schools = $School->updateSchool($_POST);
	}
}
