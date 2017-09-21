<?php
namespace Mini\Controller;

use Mini\Model\Student;

use Mini\Libs\JSON;

class StudentController
{
	public function add()
	{
		$Student = new Student();
		$students = $Student->addStudent($_POST);

		if ($students > 0)
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
		$Student = new Student();

		if ($Student->updateStudent($_POST))
		{
			$status = "success";
		}
		else
		{
			$status = "error";
		}

		$data = array(
			"status" => $status
		);

		$JSON = new JSON();
		$JSON->send($data);
	}

	public function delete()
	{
		$Student = new Student();
		$Student->deleteStudent($id);
	}
}
