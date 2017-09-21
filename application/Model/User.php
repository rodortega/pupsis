<?php
namespace Mini\Model;

use Mini\Core\Model;

class User extends Model
{
	public function student(array $login)
	{
		$sql = "
		SELECT *
		FROM students
		WHERE
			user_code = :user_code
		AND birthdate = :birthdate
		AND password = :password";

        $param = array(
            ':user_code' => $login['user_code'],
            ':birthdate' => $login['birthdate'],
            ':password' => $login['password']
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetch();
	}

	public function professor(array $login)
	{
		$sql = "
		SELECT *
		FROM professors
		WHERE
			user_code = :user_code
		AND birthdate = :birthdate
		AND password = :password";

        $param = array(
            ':user_code' => $login['user_code'],
            ':birthdate' => $login['birthdate'],
            ':password' => $login['password']
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetch();
	}

	public function registrar(array $login)
	{
		$sql = "
		SELECT *
		FROM registrars
		WHERE
			user_code = :user_code
		AND birthdate = :birthdate
		AND password = :password";

        $param = array(
            ':user_code' => $login['user_code'],
            ':birthdate' => $login['birthdate'],
            ':password' => $login['password']
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetch();
	}
}
