<?php
namespace Mini\Controller;

use Mini\Model\Course;

use Mini\Libs\JSON;

class CourseController
{
	public function search()
	{
		$Course = new Course();
		$courses = $Course->getRoomsBySchoolId($_POST['school_id']);

		$JSON = new JSON();
		$JSON->send($courses);
	}
}
