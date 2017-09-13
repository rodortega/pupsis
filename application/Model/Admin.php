<?php
namespace Mini\Model;

use Mini\Core\Model;

class Admin extends Model
{
	public function login(array $login)
	{
		$sql = "
		SELECT id,status,firstname
		FROM admins
		WHERE
			username = :username
		AND password = :password";

        $param = array(
            ':username' => $login['username'],
            ':password' => $login['password']
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetch();
	}

	public function getProfileById($id)
	{
		$sql = "
		SELECT *
		FROM admins
		WHERE
			id = :id";

        $param = array(
            ':id' => $id
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetch();
	}
}
