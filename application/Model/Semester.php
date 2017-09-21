<?php
namespace Mini\Model;

use Mini\Core\Model;

class Semester extends Model
{
	public function getAllSemesters()
	{
		$sql = "
		SELECT *
		FROM semesters";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
	}
}
