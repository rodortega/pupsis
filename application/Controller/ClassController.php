<?php
namespace Mini\Controller;

use Mini\Model\Classer;
use Mini\Model\Vacancy;

use Mini\Libs\JSON;

class ClassController
{
	public function search()
	{
		$Classer = new Classer();
		$classes = $Classer->getAllClassesBySet($_POST);

		$classes = array_filter($classes);

		if (empty($classes))
		{
			$status = "error";
			$message = "";
		}
		else
		{
			$status = "success";
			$message = $classes;
		}

		$data = array(
			"status" => $status,
			"message" => $message
		);

		$JSON = new JSON();
		$JSON->send($data);
	}

	public function add()
	{
		$validated = $this->validateSchedule($_POST['room_id'],$_POST['week'],$_POST['time_start'],$_POST['time_end']);

		if ($validated === true)
		{
			$Class = new Classer();
			$classes = $Class->addClass($_POST);

			if ($classes > 0)
			{
				$status = "success";
			}
			else
			{
				$status = "error";
			}
		}
		else
		{
			$status = "unavailable";
		}

		$data = array("status" => $status);

		$JSON = new JSON();
		$JSON->send($data);
	}

	private function validateSchedule($room_id,$week,$time_start,$time_end)
	{
		$time_start = strtotime($time_start) + 60;
		$time_start = date("H:i:s", $time_start);

		$time_end = strtotime($time_end) - 60;
		$time_end = date("H:i:s", $time_end);

		$Vacancy = new Vacancy();
		$vacancies = $Vacancy->validateSchedule($room_id,$week,$time_start,$time_end);

		if($vacancies->count_classes == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function delete()
	{
		$Class = new Classer();
		$classes = $Class->deleteClass($_POST['id']);

		if ($classes === true)
		{
			$status = "success";
		}
		else
		{
			$status = "error";
		}

		$data = array("status" => $status);

		$JSON = new JSON();
		$JSON->send($data);
	}
}
