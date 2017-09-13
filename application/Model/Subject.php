<?php
namespace Mini\Model;

use Mini\Core\Model;

class Subject extends Model
{
	public function getAllSubjects()
	{
		$sql = "
		SELECT *
		FROM subjects";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
	}

	public function addSubject(array $data)
	{
		$sql = "
		INSERT INTO subjects
		(code,description)
		VALUES (:code,:description)";

		$param =array(
			":code" => $data['code'],
			":description" => $data['description']
		);

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $this->db->lastInsertId();
	}

	public function updateSubject(array $data)
	{
		$sql = "
		UPDATE subjects
		SET {$data["name"]} = :value
		WHERE id = :id";

		$param =array(
			":value" => $data['value'],
			":id" => $data['pk']
		);

        $query = $this->db->prepare($sql);
        $query->execute($param);
	}
}
