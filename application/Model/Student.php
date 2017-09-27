<?php
namespace Mini\Model;

use Mini\Core\Model;

class Student extends Model
{
	public function getStudentsBySchoolId($school_id)
	{
		$sql = "
		SELECT students.* , curriculums.school_id, curriculums.course_id, courses.code as course_code
		FROM students
		LEFT JOIN curriculums
		ON students.curriculum_id = curriculums.id
		LEFT JOIN courses
		ON curriculums.course_id = courses.id
		WHERE curriculums.school_id = :school_id";

		$param = array(
			":school_id" => $school_id
		);

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
	}

	public function getStudentById($id)
	{
		$sql = "
		SELECT students.*, curriculums.school_id, curriculums.course_id, courses.code as course_code
		FROM students
		LEFT JOIN curriculums
		ON students.curriculum_id = curriculums.id
		LEFT JOIN courses
		ON curriculums.course_id = courses.id
		WHERE students.id = :id";

		$param = array(
			":id" => $id
		);

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
	}

	public function addStudent(array $data)
	{
		$sql = "
		INSERT INTO students (
			curriculum_id,
			user_code,
			password,
			firstname,
			middlename,
			lastname,
			gender,
			city,
			province,
			address,
			telephone,
			mobile,
			birthdate,
			join_year,
			section,
			status)
		VALUES (
			:curriculum_id,
			:user_code,
			:password,
			:firstname,
			:middlename,
			:lastname,
			:gender,
			:city,
			:province,
			:address,
			:telephone,
			:mobile,
			:birthdate,
			:join_year,
			:section,
			:status)";

		$params = array(
			":firstname" => $data["firstname"],
			":curriculum_id" => $data["curriculum_id"],
			":middlename" => $data["middlename"],
			":lastname" => $data["lastname"],
			":gender" => $data["gender"],
			":birthdate" => $data["birthdate"],
			":mobile" => $data["mobile"],
			":telephone" => $data["telephone"],
			":address" => $data["address"],
			":city" => $data["city"],
			":province" => $data["province"],
			":user_code" => $data["user_code"],
			":password" => $data["password"],
			":join_year" => $data["join_year"],
			":section" => $data["section"],
			":status" => $data["status"]
		);

		$query = $this->db->prepare($sql);
        $query->execute($params);

        return $this->db->lastInsertId();
	}

	public function updateStudent(array $data)
	{
		$sql = "
		UPDATE students
		SET firstname = :firstname,
			middlename = :middlename,
			lastname = :lastname,
			gender = :gender,
			birthdate = :birthdate,
			mobile = :mobile,
			telephone = :telephone,
			address = :address,
			city = :city,
			province = :province,
			user_code = :user_code,
			password = :password,
			status = :status
		WHERE id = :id";

		$params = array(
			":firstname" => $data["firstname"],
			":middlename" => $data["middlename"],
			":lastname" => $data["lastname"],
			":gender" => $data["gender"],
			":birthdate" => $data["birthdate"],
			":mobile" => $data["mobile"],
			":telephone" => $data["telephone"],
			":address" => $data["address"],
			":city" => $data["city"],
			":province" => $data["province"],
			":user_code" => $data["user_code"],
			":password" => $data["password"],
			":status" => $data["status"],
			":id" => $data["id"]
		);

		$query = $this->db->prepare($sql);
        return $query->execute($params);
	}

	public function deleteStudents($id)
	{
		$sql = "
		DELETE FROM students
		WHERE id = :id";

		$param = array(
			":id" => $id
		);

		$query = $this->db->prepare($sql);
        return $query->execute($param);
	}

	public function setEnrolled($id)
	{
		$sql = "
		UPDATE students
		SET status = '2'
		WHERE id = :id";

		$param = array(
			":id" => $id
		);

		$query = $this->db->prepare($sql);
        return $query->execute($param);
	}
}
