<?php
namespace Mini\Controller;

use Mini\Model\Schedule;
use Mini\Model\Student;
use Mini\Model\System;
use Mini\Model\Subject;
use Mini\Model\Classer;

use Mini\Libs\JSON;

class ScheduleController
{
	public function add()
	{
		require VIEW . 'student/session.php';

		$subject_array = array();
		$Subject = new Subject();

		foreach ($_POST['class_id'] as $class_id)
		{
			$subject_id = $Subject->getSubjectIdbyClass($class_id);
			$subject_array[] = $subject_id->subject_id;
		}
		# check if subject has duplicate
		if (count($subject_array) !== count(array_unique($subject_array)))
		{
			$data = array("status" => "duplicate");

			$JSON = new JSON();
			$JSON->send($data);
		}
		else
		{
			# check if schedule has no conflict
			$classes = array();
			$i = 0;
			$is_conflict = false;
			foreach ($_POST['class_id'] as $class_id)
			{
				$Class = new Classer();
				$class = $Class->getClassesById($class_id);

				$classes[$i]['week'] = $class->week;
				$classes[$i]['time_start'] = strtotime($class->time_start);
				$classes[$i]['time_end'] = strtotime($class->time_end);
				$i++;
			}
			for ($k = 0; $k < count($classes); $k++)
			{
				for ($l = $k + 1; $l < count($classes); $l++)
				{
					if ($classes[$k]['week'] == $classes[$l]['week'])
					{
						if ( ($classes[$k]['time_start'] > $classes[$l]['time_start'] && $classes[$k]['time_start'] < $classes[$l]['time_end']) || ($classes[$k]['time_end'] > $classes[$l]['time_start'] && $classes[$k]['time_end'] < $classes[$l]['time_end']) )
						{
							$is_conflict = true;
							$check = "1";
						}
						# if only one minute, make it non-conflict
						if ( (abs($classes[$k]['time_end'] - $classes[$l]['time_start']) <= 60) || abs($classes[$k]['time_start'] - $classes[$l]['time_end']) <= 60 )
						{
							$is_conflict = false;
						}
						# if completely identical
						if ( $classes[$k]['time_start'] == $classes[$l]['time_start'] || $classes[$k]['time_end'] == $classes[$l]['time_end'])
						{
							$is_conflict = true;
						}
					}
				}
			}
			if ($is_conflict == true)
			{
				$data = array("status" => "conflict");
			}
			else
			{
				$this->addNew($_POST);
				$this->addExisiting($_POST);
				$this->setEnrolled();

				$data = array("status" => "success");
			}
			$JSON = new JSON();
			$JSON->send($data);
		}
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

	public function search($type = NULL)
	{
		$data = array();
		$datas = array();

		if ($type == 'student')
		{
			require VIEW . 'student/session.php';
			$Schedule = new Schedule();
			$schedules = $Schedule->getScheduleByStudentId($_SESSION['id']);
		}

		elseif ($type == 'professor')
		{
			require VIEW . 'professor/session.php';

			$System = new System();
			$systems = $System->getSystem();

			$Schedule = new Schedule();
			$schedules = $Schedule->getScheduleByProfessorId($_SESSION['id'],$systems->semester_id);
		}

		else
		{
			return false;
		}

		foreach ($schedules as $schedule)
		{
			switch ($schedule->week)
			{
				case 'Monday':
					$week = 2;
					break;

				case 'Tuesday':
					$week = 3;
					break;

				case 'Wednesday':
					$week = 4;
					break;

				case 'Thursday':
					$week = 5;
					break;

				case 'Friday':
					$week = 6;
					break;

				case 'Saturday':
					$week = 7;
					break;
			}

			$data['id'] = $schedule->id;
			$data['title'] = $schedule->subject_code .' '. $schedule->year .'-'. $schedule->section .'-'.'Room '.$schedule->room_name;
			$data['start'] = '2017-01-0'.$week.'T'.$schedule->time_start;
			$data['end'] = '2017-01-0'.$week.'T'.$schedule->time_end;
			$data['color'] = "#800000";

			array_push($datas,$data);
		}

		$JSON = new JSON();
		$JSON->send($datas);
	}

	public function grade()
	{
		$Schedule = new Schedule();
		$schedules = $Schedule->getScheduleByClassId($_POST['schedule_id']);

		$data = array(
			"status" => "success",
			"message" => $schedules
		);

		$JSON = new JSON();
		$JSON->send($data);
	}

	public function update()
	{
		if ($_POST['grade'] >= 1 && $_POST['grade'] <= 3)
		{
			$mark = 'P';
			$status = '2';
		}
		elseif ($_POST['grade'] == 'INC')
		{
			$mark = 'INC';
			$status = '1';
		}
		elseif ($_POST['grade'] == 'DROP')
		{
			$mark = 'DROP';
			$status = '0';
		}
		else
		{
			$mark = 'F';
			$status = '0';
		}

		$Schedule = new Schedule();
		$schedules = $Schedule->encodeGrade($_POST['schedule_id'],$_POST['grade'],$mark,$status);

		$data = array(
			"status" => "success"
		);

		$JSON = new JSON();
		$JSON->send($data);
	}
}
