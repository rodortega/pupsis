<?php
namespace Mini\Controller;

use Mini\Model\User;

use Mini\Libs\JSON;

class LoginController
{
	public function index()
	{
		header("location:" . APP);
	}

	public function type($type)
	{
		$User = new User();

		switch ($type)
		{
			case "student":
				$login = $User->student($_POST);
				break;

			case "professor":
				$login = $User->professor($_POST);
				break;

			case "registrar":
				$login = $User->registrar($_POST);
				break;
		}

		if (!empty($login))
		{
			if ($login->status == "1" || $login->status == "2")
			{
				session_start();
				$_SESSION["id"] = $login->id;
				$_SESSION["user_code"] = $login->user_code;
				$_SESSION["firstname"] = $login->firstname;
				$_SESSION["school_id"] = $login->school_id;
				$_SESSION["type"] = $type;

				$data = array(
					"status"  		=> "success",
					"session_id" 	=> $login->user_code
				);
			}

			else
			{
				$data = array(
					"status"  => "banned",
					"message" => "Your account has been banned. Please contact your administrator."
				);
			}
		}

		else
		{
			$data = array(
				"status" => "error",
				"message" => "Your Login information is incorrect."
			);
		}

		$json = new JSON();
		$json->send($data);
	}
}
