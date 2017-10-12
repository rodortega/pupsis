<?php
namespace Mini\Model;

use Mini\Core\Model;

class System extends Model
{
	public function getSystem()
	{
		$sql = "
		SELECT *
		FROM system";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
	}

	public function updateSystem(array $data)
	{
		$sql = "
		UPDATE system
		SET semester_id = :semester_id,
		is_encoding = :is_encoding,
		is_registration = :is_registration";

		$param =array(
			":semester_id" => $data['semester_id'],
			":is_encoding" => $data['is_encoding'],
			":is_registration" => $data['is_registration']
		);

        $query = $this->db->prepare($sql);
        return $query->execute($param);
	}
}
