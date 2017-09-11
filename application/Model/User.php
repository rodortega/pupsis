<?php
namespace Mini\Model;

use Mini\Core\Model;

class User extends Model
{
	public function student(array $login)
	{
		$sql = "
		SELECT user_code,status
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

	public function professor()
	{

	}

	public function registrar()
	{

	}

	public function admin()
	{

	}
}
