<?php
namespace Mini\Controller;

use Mini\Model\Reservation;

use Mini\Libs\JSON;

class ReservationController
{
	public function add()
	{
		$room_id = $_POST['room_id'];
		$datetime_start = strtotime($_POST['datetime_start']);
		$datetime_end = strtotime($_POST['datetime_end']);

		require VIEW . 'professor/session.php';

		$Reservation = new Reservation();
		$reservations = $Reservation->getReservationsByRoom($room_id);

		# if there are no active reservations
		$arr = (array)$reservations;
		if (empty($arr))
		{
		    $status = "success";
		}
		# check if reservation datetime has no conflict
		else
		{
			foreach ($reservations as $reservation)
			{
				if (($datetime_start >= strtotime($reservation->datetime_start) && $datetime_start <= strtotime($reservation->datetime_end)) || ($datetime_end >= strtotime($reservation->datetime_start) && $datetime_end <= strtotime($reservation->datetime_end)))
				{
					$status = "unavailable";
				}
				else
				{
					$status = "success";
				}
			}
		}
		# save if success
		if ($status == "success")
		{
			try
			{
				$_POST['professor_id'] = $_SESSION['id'];
				$reservations = $Reservation->addReservation($_POST);
			}
			catch(Exception $e)
			{
				$status = "error";
			}
		}

		$data = array(
				"status" => $status
			);

		$JSON = new JSON();
		$JSON->send($data);
	}
}
