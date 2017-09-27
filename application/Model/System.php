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
}
