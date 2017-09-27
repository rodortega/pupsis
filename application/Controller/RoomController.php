<?php
namespace Mini\Controller;

use Mini\Model\Room;

use Mini\Libs\JSON;

class RoomController
{
	public function search()
	{
		$Room = new Room();
		$rooms = $Room->getRoomsBySchoolId($_POST['school_id']);

		$JSON = new JSON();
		$JSON->send($rooms);
	}

	public function add()
	{
		$Room = new Room();
		$rooms = $Room->addRoom($_POST);

		if ($rooms > 1)
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
		$Room = new Room();
		$rooms = $Room->updateRoom($_POST);
	}

	public function delete()
	{
		$Room = new Room();
		$rooms = $Room->deleteRoom($_POST['id']);

		if ($rooms === true)
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
