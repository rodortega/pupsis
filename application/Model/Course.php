<?php
namespace Mini\Model;

use Mini\Core\Model;

class Course extends Model
{
	public function getAllCourses()
	{
		$sql = "
		SELECT *
		FROM courses";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
	}

	public function addCourse(array $data)
	{
		$sql = "
		INSERT INTO courses (code,name)
		VALUES (:code,:name)";

		$param = array(
			":code" => $data["code"],
			":name" => $data["name"]
		);

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $this->db->lastInsertId();
	}

	public function updateCourse(array $data)
	{
		$sql = "
		UPDATE courses
		SET {$data["name"]} = :value
		WHERE id = :id";

		$param = array(
			":value" => $data["value"],
			":id" => $data["pk"]
		);

        $query = $this->db->prepare($sql);
        return $query->execute($param);
	}

	public function deleteCourse($id)
	{
		$sql = "
		DELETE FROM courses
		WHERE id = :id";

		$param = array(
			":id" => $id
		);

        $query = $this->db->prepare($sql);
        return $query->execute($param);
	}
}
