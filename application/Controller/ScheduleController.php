<?php
namespace Mini\Controller;

use Mini\Model\Schedule;
use Mini\Model\Student;

use Mini\Libs\JSON;

class ScheduleController
{
	public function add()
	{
		require VIEW . 'student/session.php';

		$this->addNew($_POST);
		$this->addExisiting($_POST);
		$this->setEnrolled();

		$data = array("status" => "success");

		$JSON = new JSON();
		$JSON->send($data);
	}

	# add new subjects to schedule
	public function addNew(array $data)
	{
		$Schedule = new Schedule();

		foreach ($data['class_id'] as $class_id)
		{
			$new_data = array(
				"student_id" => $_SESSION['id'],
				"class_id" => $class_id
			);

			$schedules = $Schedule->addSchedule($new_data);
		}
	}

	# update back subjects in schedule
	public function addExisiting(array $data)
	{
		$Schedule = new Schedule();

		if (isset($_POST['failed_class_id']) && !empty($_POST['failed_class_id']))
		{
			foreach ($_POST['failed_class_id'] as $class_id)
			{
				$failed_data = array(
					"student_id" => $_SESSION['id'],
					"class_id" => $class_id
				);

				$schedules = $Schedule->activateSchedule($failed_data);
			}
		}
	}

	public function setEnrolled()
	{
		$Student = new Student();
		$Student->setEnrolled($_SESSION['id']);
	}
}
