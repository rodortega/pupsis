<?php
namespace Mini\Controller;

use Mini\Model\Admin;
use Mini\Model\School;
use Mini\Model\Registrar;
use Mini\Model\Course;
use Mini\Model\Subject;
use Mini\Model\Curriculum;
use Mini\Model\System;
use Mini\Model\Semester;

use Mini\Libs\JSON;

class AdminController
{
	public function index()
	{
		$page_title = "Admin Login";

		require VIEW . '_template/header_guest.php';
		require VIEW . 'home/login_admin.php';
		require VIEW . '_template/footer.php';
	}

	public function login()
	{
		$Admin = new Admin();
		$admins = $Admin->login($_POST);

		if (!empty($admins))
		{
			if ($admins->status == "1")
			{
				session_start();
				$_SESSION["id"] = $admins->id;
				$_SESSION["type"] = "admin";
				$_SESSION["firstname"] = $admins->firstname;

				$data = array(
					"status" => "success",
					"session_id" => $admins->id
				);
			}
			else
			{
				$data = array(
					"status" => "banned",
					"message" => "Your account is banned."
				);
			}
		}
		else
		{
			$data = array(
					"status" => "error",
					"message" => "Username or password is incorrect."
				);
		}

		$json = new JSON();
		$json->send($data);
	}

	public function dashboard()
	{ /*
		require VIEW . 'admin/session.php';

		$page_title = "Dashboard";

		$Admin = new Admin();
		$admins = $Admin->getProfileById($_SESSION['id']);

		require VIEW . '_template/header_admin.php';
		require VIEW . 'admin/dashboard.php';
		require VIEW . '_template/footer.php';
		*/
		header('location:' . URL . 'admin/school');
	}

	public function school()
	{
		require VIEW . 'admin/session.php';

		$page_title = "Schools";

		$School = new School();
		$schools = $School->getAllSchools();

		require VIEW . '_template/header_admin.php';
		require VIEW . 'admin/school.php';
		require VIEW . '_template/footer.php';
	}

	public function school_add()
	{
		require VIEW . 'admin/session.php';

		$page_title = "Add School";

		require VIEW . '_template/header_admin.php';
		require VIEW . 'admin/school_add.php';
		require VIEW . '_template/footer.php';
	}

	public function school_courses($id)
	{
		require VIEW . 'admin/session.php';

		$page_title = "School Courses";

		$School = new School();
		$schools = $School->getSchoolById($id);

		$Curriculum = new Curriculum();
		$curriculums = $Curriculum->getCurriculumsBySchoolId($id);

		$Course = new Course();
		$courses = $Course->getAllCourses();

		require VIEW . '_template/header_admin.php';
		require VIEW . 'admin/school_course.php';
		require VIEW . '_template/footer.php';
	}

	public function registrar()
	{
		require VIEW . 'admin/session.php';

		$page_title = "Registars";

		$Registrar = new Registrar();
		$registrars = $Registrar->getAllRegistrars();

		require VIEW . '_template/header_admin.php';
		require VIEW . 'admin/registrar.php';
		require VIEW . '_template/footer.php';
	}

	public function registrar_add()
	{
		require VIEW . 'admin/session.php';

		$page_title = "Add Registar";

		$Registrar = new Registrar();
		$registrars = $Registrar->getAllRegistrars();

		$School = new School();
		$schools = $School->getAllSchools();

		require VIEW . '_template/header_admin.php';
		require VIEW . 'admin/registrar_add.php';
		require VIEW . '_template/footer.php';
	}

	public function registrar_edit($id)
	{
		require VIEW . 'admin/session.php';

		$page_title = "Edit Registar";

		$Registrar = new Registrar();
		$registrars = $Registrar->getRegistrarById($id);

		$School = new School();
		$schools = $School->getAllSchools();

		require VIEW . '_template/header_admin.php';
		require VIEW . 'admin/registrar_edit.php';
		require VIEW . '_template/footer.php';
	}

	public function room()
	{
		require VIEW . 'admin/session.php';

		$page_title = "Rooms";

		$School = new School();
		$schools = $School->getAllSchools();

		require VIEW . '_template/header_admin.php';
		require VIEW . 'admin/room.php';
		require VIEW . '_template/footer.php';
	}

	public function course()
	{
		require VIEW . 'admin/session.php';

		$page_title = "Courses";

		$Course = new Course();
		$courses = $Course->getAllCourses();

		require VIEW . '_template/header_admin.php';
		require VIEW . 'admin/course.php';
		require VIEW . '_template/footer.php';
	}

	public function subject()
	{
		require VIEW . 'admin/session.php';

		$page_title = "Subjects";

		$Subject = new Subject();
		$subjects = $Subject->getAllSubjects();

		require VIEW . '_template/header_admin.php';
		require VIEW . 'admin/subject.php';
		require VIEW . '_template/footer.php';
	}

	public function prerequisite()
	{
		require VIEW . 'admin/session.php';

		$page_title = "Prerequisites";

		$Subject = new Subject();
		$subjects = $Subject->getAllSubjectsWithPrerequisite();

		require VIEW . '_template/header_admin.php';
		require VIEW . 'admin/prerequisite.php';
		require VIEW . 'admin/modal_prerequisite.php';
		require VIEW . '_template/footer.php';
	}

	public function system()
	{
		require VIEW . 'admin/session.php';

		$page_title = "Prerequisites";

		$Semester = new Semester();
		$semesters = $Semester->getAllSemesters();

		$System = new System();
		$systems = $System->getSystem();

		require VIEW . '_template/header_admin.php';
		require VIEW . 'admin/system.php';
		require VIEW . '_template/footer.php';
	}

	public function accounts()
	{
		require VIEW . 'admin/session.php';

		$page_title = "Account Settings";

		$Admin = new Admin();
		$admins = $Admin->getProfileById($_SESSION['id']);

		require VIEW . '_template/header_admin.php';
		require VIEW . 'admin/account.php';
		require VIEW . '_template/footer.php';
	}
}
