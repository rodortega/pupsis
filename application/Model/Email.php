<?php
namespace Mini\Model;

use Mini\Core\Model;

class Email extends Model
{
	public function change($type, $id, $email)
	{
		$sql = "
		UPDATE $type SET
		email = :email
		WHERE id = :id";

		$param = array(
            ':email' => $email,
            ':id' => $id
        );

        $query = $this->db->prepare($sql);
        return $query->execute($param);
	}
}
