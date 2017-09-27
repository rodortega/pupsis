<?php
namespace Mini\Model;

use Mini\Core\Model;

class Prerequisite extends Model
{
	public function getPrerequisiteBySubjectId($subject_id)
	{
		$sql = "
		SELECT *
		FROM prerequisites
		WHERE subject_id = :subject_id";

        $param = array(
			":subject_id" => $subject_id
		);

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetch();
	}
}
