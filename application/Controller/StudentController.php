<?php
namespace Mini\Controller;

use Mini\Model\Student;
use Mini\Model\Classer;
use Mini\Model\System;
use Mini\Model\Schedule;
use Mini\Model\Prerequisite;

use Mini\Libs\JSON;

class StudentController
{
	public function dashboard()
	{
		/*
		require VIEW . 'student/session.php';

		$page_title = "Dashboard";

		$Student = new Student();
		$students = $Student->getStudentById($_SESSION['id']);

		require VIEW . '_template/header_student.php';
		require VIEW . 'student/dashboard.php';
		require VIEW . '_template/footer.php';
		*/
		header('location:' . URL . 'student/enrollment');
	}

	public function enrollment()
	{
		require VIEW . 'student/session.php';

		$page_title = "Enrollment";

		$System = new System();
		$systems = $System->getSystem();

		if ($systems->is_registration == '0')
		{
			require VIEW . '_template/header_student.php';
			require VIEW . 'student/no_registration.php';
			require VIEW . '_template/footer.php';
		}

		else
		{
			$semester_id = $systems->semester_id;

			$Student = new Student();
			$students = $Student->getStudentById($_SESSION['id']);

			foreach ($students as $student)
			{
				$stud_user_code = $student->user_code;
				$stud_year = date("Y") - $student->join_year + 1;
				$stud_curriculum_id = $student->curriculum_id;
				$stud_section = $student->section;
				$stud_status = $student->status;
			}

			$details = array(
				"semester_id" => $semester_id,
				"year" => $stud_year,
				"section" => $stud_section,
				"curriculum_id" => $stud_curriculum_id
			);

			$Class = new Classer();
			$classes = $Class->getAllClassesBySet($details);

			# get all failed subjects
			$Schedule = new Schedule();
			$fails = $Schedule->getFailedSchedule($_SESSION["id"]);

			$failed_subjects = array();
			foreach ($fails as $schedule)
			{
				$failed_subjects[] = $schedule->subject_id;
			}

			# get all new subjects
			$pre_subjects = array();
			$conflict = array();

			$Prerequisite = new Prerequisite();

			foreach ($classes as $class)
			{
				# get all prerequisites
				$prerequisites = $Prerequisite->getPrerequisiteBySubjectId($class->subject_id);
				# if there is a prereq ..
				if ($prerequisites)
				{
					# check if a prereq is a failed subject
					if (in_array($prerequisites->pre_subject_id, $failed_subjects))
					{
						# prohibit user from selecting the new subject which has a failed prereq
						$conflict[] = $class->subject_id;
					}
				}
			}

			require VIEW . '_template/header_student.php';
			require VIEW . 'student/enrollment.php';
			require VIEW . '_template/footer.php';
		}
	}

	public function search()
	{
		$System = new System();
		$systems = $System->getSystem();

		$Student = new Student();
		$students = $Student->getStudentsByClassId($_POST['class_id']);

		$data = array(
			"status" => "success",
			"is_encoding" => $systems->is_encoding,
			"message" => $students
		);

		$JSON = new JSON();
		$JSON->send($data);
	}

	public function schedule()
	{
		require VIEW . 'student/session.php';

		$page_title = "Schedule";

		require VIEW . '_template/header_student.php';
		require VIEW . 'student/schedule.php';
		require VIEW . '_template/footer.php';
	}

	public function grades()
	{
		require VIEW . 'student/session.php';

		$page_title = "Grades";

		$Schedule = new Schedule();
		$schedules = $Schedule->getGradesByStudentId($_SESSION['id']);

		require VIEW . '_template/header_student.php';
		require VIEW . 'student/grade.php';
		require VIEW . '_template/footer.php';
	}

	public function add()
	{
		$Student = new Student();
		$students = $Student->addStudent($_POST);

		if ($students > 0)
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
		$Student = new Student();

		if ($Student->updateStudent($_POST))
		{
			$status = "success";
		}
		else
		{
			$status = "error";
		}

		$data = array(
			"status" => $status
		);

		$JSON = new JSON();
		$JSON->send($data);
	}

	public function delete()
	{
		$Student = new Student();
		$Student->deleteStudent($id);
	}

	public function accounts()
	{
		require VIEW . 'student/session.php';

		$page_title = "Account Settings";

		$Student = new Student();
		$students = $Student->getStudentById($_SESSION['id']);

		require VIEW . '_template/header_student.php';
		require VIEW . 'student/account.php';
		require VIEW . '_template/footer.php';
	}
}
