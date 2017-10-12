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

	public function getSubjectsByProfessorId($professor_id,$semester_id)
	{
		$sql = "
		SELECT classes.id, subjects.code, subjects.name
		FROM classes
		LEFT JOIN subjects
		ON classes.subject_id = subjects.id
		WHERE classes.professor_id = :professor_id
		AND classes.semester_id = :semester_id";

		$param =array(
			":professor_id" => $professor_id,
			":semester_id" => $semester_id
		);

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
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

	public function getAllSubjectsWithPrerequisite()
	{
		$sql = "
		SELECT s.id, s.code, s.name, ss.id as pre_id, ss.code as pre_code, ss.name as pre_name
		FROM subjects s
		LEFT JOIN prerequisites p
		ON p.subject_id = s.id
		LEFT JOIN subjects ss
		ON ss.id = p.pre_subject_id";

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
