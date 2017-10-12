<?php
namespace Mini\Controller;

use Mini\Model\Password;

use Mini\Libs\JSON;

class PasswordController
{
	public function change($type)
	{
		$Password = new Password();

		switch ($type)
		{
			case "student":
				require VIEW . 'student/session.php';
				$passwords = $Password->checkPassword('students',$_SESSION['id'],$_POST['old_password']);
				break;

			case "professor":
				require VIEW . 'professor/session.php';
				$passwords = $Password->checkPassword('professors',$_SESSION['id'],$_POST['old_password']);
				break;

			case "registrar":
				require VIEW . 'registrar/session.php';
				$passwords = $Password->checkPassword('registrars',$_SESSION['id'],$_POST['old_password']);
				break;

			case "admin":
				require VIEW . 'admin/session.php';
				$passwords = $Password->checkPassword('admins',$_SESSION['id'],$_POST['old_password']);
				break;
		}

		if ($passwords->count >= 1)
		{
			if ($_POST['new_password1'] != $_POST['new_password2'])
			{
				$data = array(
					"status" => "error",
					"message" => "New Passwords do not match"
				);

				$json = new JSON();
				$json->send($data);
			}

			else
			{
				$this->type($type,$_POST['new_password1']);
			}
		}

		else
		{
			$data = array(
				"status" => "error",
				"message" => "Old Password is incorrect"
			);

			$json = new JSON();
			$json->send($data);
		}
	}

	public function type($type,$password)
	{
		$Password = new Password();

		switch ($type)
		{
			case "student":
				$passwords = $Password->change('students',$_SESSION['id'],$password);
				break;

			case "professor":
				$passwords = $Password->change('professors',$_SESSION['id'],$password);
				break;

			case "registrar":
				$passwords = $Password->change('registrars',$_SESSION['id'],$password);
				break;

			case "admin":
				$passwords = $Password->change('admins',$_SESSION['id'],$password);
				break;
		}

		if ($passwords === true)
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
