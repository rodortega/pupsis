<?php
namespace Mini\Controller;

use Mini\Model\Professor;

use Mini\Libs\JSON;

class ProfessorController
{
	public function index()
	{
		$page_title = "Login";

		require VIEW . '_template/header_guest.php';
		require VIEW . 'home/login_professor.php';
		require VIEW . '_template/footer.php';
	}

	public function search()
	{

	}

	public function add()
	{
		$Professor = new Professor();
		$professors = $Professor->addProfessor($_POST);

		if ($professors >= 1)
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
		$Professor = new Professor();

		if ($Professor->updateProfessor($_POST) === true)
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

	}
}
