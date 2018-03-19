<?php
namespace Mini\Controller;

use Mini\Model\System;
use Mini\Model\Student;
use Mini\Libs\JSON;

class SystemController
{
	public function change()
	{
		$System = new System();
		$systems = $System->updateSystem($_POST);

		if (isset($_POST['is_reset']))
		{
			$Student = new Student();
			$student = $Student->removeEnrolled();
		}

		if ($systems === true)
		{
			$status = "success";
		}
		else
		{
			$status = "error";
		}

		$data = array("status" => $status);

		$json = new JSON();
		$json->send($data);
	}
}
