<?php
namespace Mini\Model;

use Mini\Core\Model;

class Registrar extends Model
{
	public function getProfessorsBySchoolId($school_id)
	{
		$sql = "
		SELECT *
		FROM professors
		WHERE school_id = :school_id";

		$param = array(
			":school_id" => $school_id
		);

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
	}

	public function getProfessorById($id)
	{
		$sql = "
		SELECT *
		FROM professors
		WHERE id = :id";

		$param = array(
			":id" => $id
		);

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
	}

	public function addProfessor(array $data)
	{
		$sql = "
		INSERT INTO professors (
			school_id,
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
			status)
		VALUES (
			:school_id,
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
			:status)";

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
			":school_id" => $data["school_id"],
			":status" => $data["status"]
		);

		$query = $this->db->prepare($sql);
        $query->execute($params);

        return $this->db->lastInsertId();
	}

	public function updateProfessor(array $data)
	{
		$sql = "
		UPDATE professors
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

	public function deleteProfessor($id)
	{
		$sql = "
		DELETE FROM professors
		WHERE id = :id";

		$query = $this->db->prepare($sql);
        return $query->execute($params);
	}
}
