<?php
namespace Mini\Model;

use Mini\Core\Model;

class Subject extends Model
{
	public function getSubjectById($id)
	{
		$sql = "
		SELECT *
		FROM subjects
		WHERE id = :id";

        $param =array(
			":id" => $id
		);

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetch();
	}
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
		(code,name)
		VALUES (:code,:name)";

		$param =array(
			":code" => $data['code'],
			":name" => $data['name']
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

	public function deleteSubject($id)
	{
		$sql = "
		DELETE FROM subjects
		WHERE id = :id";

		$param = array(
			":id" => $id
		);

        $query = $this->db->prepare($sql);
        return $query->execute($param);
	}
}
