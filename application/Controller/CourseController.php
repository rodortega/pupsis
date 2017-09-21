<?php
namespace Mini\Controller;

use Mini\Model\Course;

use Mini\Libs\JSON;

class CourseController
{
	public function add()
	{
		$Course = new Course();
		$courses = $Course->addCourse($_POST);

		if ($courses > 0)
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
		$Course = new Course();
		$courses = $Course->updateCourse($_POST);
	}
}
