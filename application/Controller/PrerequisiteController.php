<?php
namespace Mini\Controller;

use Mini\Model\Prerequisite;

use Mini\Libs\JSON;

class PrerequisiteController
{
	public function add()
	{
		$Prerequisite = new Prerequisite();
		$prerequisites = $Prerequisite->addPrerequisite($_POST);

		if ($prerequisites >= 1)
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
		$Prerequisite = new Prerequisite();
		$prerequisites = $Prerequisite->deletePrerequisiteBySubjectId($_POST['subject_id']);

		if ($prerequisites)
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
}
