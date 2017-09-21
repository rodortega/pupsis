<?php
namespace Mini\Controller;

use Mini\Model\Vacancy;

use Mini\Libs\JSON;

class VacancyController
{
	public function search()
	{
		require VIEW . "registrar/session.php";

		$Vacancy = new Vacancy();
		$vacancies = $Vacancy->getVacanciesByRoomId($_POST['room_id']);

		$data = array();
		$datas = array();

		foreach ($vacancies as $vacancy)
		{
			switch ($vacancy->week)
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

			$data['id'] = $vacancy->id;
			$data['title'] = $vacancy->course_code .' '. $vacancy->year .'-'. $vacancy->section .' '.$vacancy->subject_code;
			$data['start'] = '2017-01-0'.$week.'T'.$vacancy->time_start;
			$data['end'] = '2017-01-0'.$week.'T'.$vacancy->time_end;
			$data['color'] = "#800000";

			array_push($datas,$data);
		}

		$JSON = new JSON();
		$JSON->send($datas);
	}

	public function edit()
	{
		$Vacancy = new Vacancy();
		if($Vacancy->updateVacancy($_POST))
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
}
