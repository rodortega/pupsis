<?php
namespace Mini\Model;

use Mini\Core\Model;

class Password extends Model
{
	public function checkPassword($type, $id, $password)
	{
		$sql = "
		SELECT COUNT(*) as count
		FROM $type
		WHERE password = :password
		AND id = :id";

		$param = array(
            ':password' => $password,
            ':id' => $id
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetch();
	}

	public function change($type, $id, $password)
	{
		$sql = "
		UPDATE $type SET
		password = :password
		WHERE id = :id";

		$param = array(
            ':password' => $password,
            ':id' => $id
        );

        $query = $this->db->prepare($sql);
        return $query->execute($param);
	}
}
