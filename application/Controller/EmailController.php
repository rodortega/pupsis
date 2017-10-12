<?php
namespace Mini\Controller;

use Mini\Model\Email;

use Mini\Libs\JSON;

class EmailController
{
	public function change($type)
	{
		switch ($type)
		{
			case "students":
				require VIEW . 'student/session.php';
				break;

			case "professors":
				require VIEW . 'professor/session.php';
				break;

			case "registrars":
				require VIEW . 'registrar/session.php';
				break;
		}

		$Email = new Email();
		$emails = $Email->change($type,$_SESSION['id'],$_POST['email']);

		if ($emails)
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