<?php
namespace Mini\Model;

use Mini\Core\Model;

class Prerequisite extends Model
{
	public function addPrerequisite(array $data)
	{
		$sql = "
		INSERT INTO prerequisites(subject_id,pre_subject_id)
		VALUES (:subject_id,:pre_subject_id)";

		$param = array(
			":subject_id" => $data['subject_id'],
			":pre_subject_id" => $data['pre_subject_id']
		);

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $this->db->lastInsertId();
	}

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

	public function deletePrerequisiteBySubjectId($subject_id)
	{
		$sql = "
		DELETE
		FROM prerequisites
		WHERE subject_id = :subject_id";

        $param = array(
			":subject_id" => $subject_id
		);

        $query = $this->db->prepare($sql);
        return $query->execute($param);
	}
}
