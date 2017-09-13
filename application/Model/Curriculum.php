<?php
namespace Mini\Model;

use Mini\Core\Model;

class Curriculum extends Model
{
	public function getCurriculumsBySchoolId($school_id)
	{
		$sql = "
		SELECT *
		FROM curriculums
		WHERE school_id = :school_id";

		$param = array(
            ':school_id' => $school_id
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
	}

	public function addCurriculum(array $data)
	{
		$sql = "
		INSERT INTO curriculums (school_id,code,name)
		VALUES (:school_id,:code,:name)";

        $param = array(
            ':school_id' => $data['school_id'],
            ':code' => $data['code'],
            ':name' => $data['name']
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $this->db->lastInsertId();
	}

	public function updateCurriculum(array $data)
	{
		$sql = "
		UPDATE curriculums
		SET {$data["name"]} = :value
		WHERE id = :id";

		$param = array(
            ':value' => $data['value'],
            ':id' => $data['pk']
        );

        $query = $this->db->prepare($sql);
        return $query->execute($param);
	}

	public function deleteCurriculum($id)
	{
		$sql = "
		DELETE FROM curriculums
		WHERE id = :id";

		$param = array(
            ':id' => $id
        );

        $query = $this->db->prepare($sql);
        return $query->execute($param);
	}
}
