<?php
namespace Mini\Model;

use Mini\Core\Model;

class Reservation extends Model
{
	public function getActiveReservationsBySchool($school_id)
	{
		$sql = "
		SELECT reservations.*, rooms.name, professors.firstname, professors.lastname
		FROM reservations
		LEFT JOIN professors
		ON reservations.professor_id = professors.id
		LEFT JOIN rooms
		ON reservations.room_id = rooms.id
		WHERE rooms.school_id = :school_id
		AND reservations.status = 2";

		$param = array(
			":school_id" => $school_id
		);

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
	}

	public function getReservationsByRoom($room_id)
	{
		$sql = "
		SELECT *
		FROM reservations
		WHERE room_id = :room_id
		AND status != 0";

		$param = array(
			":room_id" => $room_id
		);

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
	}

	public function addReservation(array $data)
	{
		$sql = "
		INSERT INTO reservations(
		room_id,
		professor_id,
		description,
		datetime_start,
		datetime_end)
		VALUES(
		:room_id,
		:professor_id,
		:description,
		:datetime_start,
		:datetime_end)";

		$param = array(
			":room_id" => $data['room_id'],
			":professor_id" => $data['professor_id'],
			":description" => $data['description'],
			":datetime_start" => $data['datetime_start'],
			":datetime_end" => $data['datetime_end']
		);

        $query = $this->db->prepare($sql);
        return $query->execute($param);
	}
}