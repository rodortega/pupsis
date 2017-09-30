<?php
namespace Mini\Controller;

use Mini\Model\Professor;
use Mini\Model\Schedule;
use Mini\Model\System;
use Mini\Model\Subject;

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

	public function dashboard()
	{
		require VIEW . 'professor/session.php';

		$page_title = "Dashboard";

		require VIEW . '_template/header_professor.php';
		require VIEW . 'professor/dashboard.php';
		require VIEW . '_template/footer.php';
	}

	public function schedule()
	{
		require VIEW . 'professor/session.php';

		$page_title = "Schedule";

		require VIEW . '_template/header_professor.php';
		require VIEW . 'professor/schedule.php';
		require VIEW . '_template/footer.php';
	}

	public function students()
	{
		require VIEW . 'professor/session.php';

		$page_title = "Students";

		$System = new System();
		$systems = $System->getSystem();

		$Subject = new Subject();
		$subjects = $Subject->getSubjectsByProfessorId($_SESSION['id'],$systems->semester_id);

		require VIEW . '_template/header_professor.php';
		require VIEW . 'professor/student.php';
		require VIEW . 'professor/modal_grade.php';
		require VIEW . '_template/footer.php';
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
}
