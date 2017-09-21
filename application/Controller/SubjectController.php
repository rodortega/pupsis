<?php
namespace Mini\Controller;

use Mini\Model\Subject;

use Mini\Libs\JSON;

class SubjectController
{
	public function add()
	{
		$Subject = new Subject();
		$subjects = $Subject->addSubject($_POST);

		if ($subjects >= 1)
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
		$Subject = new Subject();
		$subjects = $Subject->updateSubject($_POST);
	}

	public function delete()
	{
		$Subject = new Subject();
		$subjects = $Subject->deleteSubject($_POST['id']);
	}
}
