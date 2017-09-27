<?php
namespace Mini\Controller;

use Mini\Model\Registrar;
use Mini\Model\School;
use Mini\Model\Professor;
use Mini\Model\Student;
use Mini\Model\Curriculum;
use Mini\Model\Vacancy;
use Mini\Model\Room;
use Mini\Model\Semester;
use Mini\Model\Subject;

use Mini\Libs\JSON;

class RegistrarController
{
	public function index()
	{
		$page_title = "Registrar Login";

		require VIEW . '_template/header_guest.php';
		require VIEW . 'home/login_registrar.php';
		require VIEW . '_template/footer.php';
	}

	public function dashboard()
	{
		require VIEW . 'registrar/session.php';

		$page_title = "Dashboard";

		$Registrar = new Registrar();
		$registrars = $Registrar->getProfileById($_SESSION['id']);

		require VIEW . '_template/header_registrar.php';
		require VIEW . 'registrar/dashboard.php';
		require VIEW . '_template/footer.php';
	}

	public function professor_add()
	{
		require VIEW . 'registrar/session.php';

		$page_title = "Add Professor";

		$School = new School();
		$schools = $School->getAllSchools();

		require VIEW . '_template/header_registrar.php';
		require VIEW . 'registrar/professor_add.php';
		require VIEW . '_template/footer.php';
	}

	public function professor()
	{
		require VIEW . 'registrar/session.php';

		$page_title = "Professors";

		$Professor = new Professor();
		$professors = $Professor->getProfessorsBySchoolId($_SESSION['school_id']);

		require VIEW . '_template/header_registrar.php';
		require VIEW . 'registrar/professor.php';
		require VIEW . '_template/footer.php';
	}

	public function professor_edit($professor_id)
	{
		require VIEW . 'registrar/session.php';

		$page_title = "Professors";

		$Professor = new Professor();
		$professors = $Professor->getProfessorById($professor_id);

		$School = new School();
		$schools = $School->getAllSchools();

		require VIEW . '_template/header_registrar.php';
		require VIEW . 'registrar/professor_edit.php';
		require VIEW . '_template/footer.php';
	}

	public function student()
	{
		require VIEW . 'registrar/session.php';

		$page_title = "Students";

		$Student = new Student();
		$students = $Student->getStudentsBySchoolId($_SESSION['school_id']);

		require VIEW . '_template/header_registrar.php';
		require VIEW . 'registrar/student.php';
		require VIEW . '_template/footer.php';
	}

	public function student_add()
	{
		require VIEW . 'registrar/session.php';

		$page_title = "Add Students";

		$School = new School();
		$schools = $School->getAllSchools();

		$Curriculum = new Curriculum();
		$curriculums = $Curriculum->getCurriculumsBySchoolId($_SESSION['school_id']);

		require VIEW . '_template/header_registrar.php';
		require VIEW . 'registrar/student_add.php';
		require VIEW . '_template/footer.php';
	}

	public function student_edit($id)
	{
		require VIEW . 'registrar/session.php';

		$page_title = "Edit Students";

		$School = new School();
		$schools = $School->getAllSchools();

		$Student = new Student();
		$students = $Student->getStudentById($id);

		$Curriculum = new Curriculum();
		$curriculums = $Curriculum->getCurriculumsBySchoolId($_SESSION['school_id']);

		require VIEW . '_template/header_registrar.php';
		require VIEW . 'registrar/student_edit.php';
		require VIEW . '_template/footer.php';
	}

	public function curriculum()
	{
		require VIEW . 'registrar/session.php';

		$page_title = "Curriculums";

		$Curriculum = new Curriculum();
		$curriculums = $Curriculum->getCurriculumsBySchoolId($_SESSION['school_id']);

		$Semester = new Semester();
		$semesters = $Semester->getAllSemesters();

		$Professor = new Professor();
		$professors = $Professor->getProfessorsBySchoolId($_SESSION['school_id']);

		$Subject = new Subject();
		$subjects = $Subject->getAllSubjects();

		$Room = new Room();
		$rooms = $Room->getRoomsBySchoolId($_SESSION['school_id']);

		require VIEW . '_template/header_registrar.php';
		require VIEW . 'registrar/curriculum_add.php';
		require VIEW . 'registrar/curriculum.php';
		require VIEW . '_template/footer.php';
	}

	public function vacancy()
	{
		require VIEW . 'registrar/session.php';

		$page_title = "Vacancies";

		$Room = new Room();
		$rooms = $Room->getRoomsBySchoolId($_SESSION['school_id']);

		require VIEW . '_template/header_registrar.php';
		require VIEW . 'registrar/vacancy.php';
		require VIEW . '_template/footer.php';
	}

	public function add()
	{
		$Registrar = new Registrar();

		if($Registrar->addRegistrar($_POST) > 0)
		{
			$data = array(
				"status" => "success"
			);
		}
		else
		{
			$data = array(
				"status" => "error"
			);
		}

		$JSON = new JSON();
		$JSON->send($data);
	}

	public function edit()
	{
		$Registrar = new Registrar();
		$registrars = $Registrar->updateRegistrar($_POST);

		$data = array
		(
			"status" => "success"
		);

		$JSON = new JSON();
		$JSON->send($data);
	}
}
