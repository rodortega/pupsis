<?php
namespace Mini\Model;

use Mini\Core\Model;

class Room extends Model
{
	public function getRoomsBySchoolId($school_id)
	{
		$sql = "
		SELECT *
		FROM rooms
		WHERE school_id = :school_id";

		$param = array(
			":school_id" => $school_id
		);

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
	}

	public function addRoom(array $data)
	{
		$sql = "
		INSERT INTO rooms (school_id,name)
		VALUES (:school_id,:name)";

		$param = array(
			":school_id" => $data["school_id"],
			":name" => $data["name"]
		);

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $this->db->lastInsertId();
	}

	public function updateRoom(array $data)
	{
		$sql = "
		UPDATE rooms
		SET {$data["name"]} = :value
		WHERE id = :id";

		$param = array(
			":value" => $data["value"],
			":id" => $data["pk"]
		);

        $query = $this->db->prepare($sql);
        return $query->execute($param);
	}

	public function deleteRoom($id)
	{
		$sql = "
		DELETE FROM rooms
		WHERE id = :id";

		$param = array(
			":id" => $id
		);

        $query = $this->db->prepare($sql);
        return $query->execute($param);
	}
}
