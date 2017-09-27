<?php
namespace Mini\Model;

use Mini\Core\Model;

class School extends Model
{
	public function getSchoolById($id)
	{
		$sql = "
		SELECT *
		FROM schools
		WHERE id = :id";

		$param = array(
			":id" => $id
		);

		$query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetch();
	}

	public function getAllSchools()
	{
		$sql = "
		SELECT *
		FROM schools";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
	}

	public function addSchool(array $data)
	{
		$sql = "
		INSERT INTO schools
		(name,description)
		VALUES (:name,:description)";

		$param =array(
			":name" => $data['name'],
			":description" => $data['description']
		);

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $this->db->lastInsertId();
	}

	public function updateSchool(array $data)
	{
		$sql = "
		UPDATE schools
		SET {$data["name"]} = :value
		WHERE id = :id";

		$param =array(
			":value" => $data['value'],
			":id" => $data['pk']
		);

        $query = $this->db->prepare($sql);
        $query->execute($param);
	}

	public function deleteSchool($id)
	{
		$sql = "
		DELETE FROM schools
		WHERE id = :id";

		$param =array(
			":id" => $id
		);

        $query = $this->db->prepare($sql);
        return $query->execute($param);
	}
}
