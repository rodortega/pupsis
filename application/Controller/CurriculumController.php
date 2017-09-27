<?php
namespace Mini\Controller;

use Mini\Model\Curriculum;

use Mini\Libs\JSON;

class CurriculumController
{
	public function add()
	{
		$Curriculum = new Curriculum();
		$curriculums = $Curriculum->addCurriculum($_POST);

		if ($curriculums > 0)
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

	public function delete()
	{
		$Curriculum = new Curriculum();
		$curriculums = $Curriculum->deleteCurriculum($_POST['id']);

		if ($curriculums === true)
		{
			$status = "success";
		}
		else
		{
			$status = "error";
		}

		$data = array("status" => $status);

		$JSON = new JSON();
		$JSON->send($data);
	}
}
