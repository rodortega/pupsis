<?php
namespace Mini\Model;

use Mini\Core\Model;

class Classer extends Model
{
	public function getAllClassesBySet(array $data)
	{
		$sql = "
		SELECT classes.*, professors.firstname, professors.lastname, subjects.code as subject_code, subjects.name as subject_name, rooms.name as room_name
		FROM classes
		LEFT JOIN professors
		ON professors.id = classes.professor_id
		LEFT JOIN subjects
		ON subjects.id = classes.subject_id
		LEFT JOIN rooms
		ON rooms.id = classes.room_id
		WHERE classes.curriculum_id = :curriculum_id
		AND classes.semester_id = :semester_id
		AND classes.year = :year
		AND classes.section = :section";

        $param = array(
            ':curriculum_id' => $data['curriculum_id'],
            ':semester_id' => $data['semester_id'],
            ':year' => $data['year'],
            ':section' => $data['section']
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
	}

	public function addClass(array $data)
	{
		$sql = "
		INSERT INTO classes (
		curriculum_id,
		professor_id,
		subject_id,
		semester_id,
		room_id,
		year,
		section,
		units,
		lec_count,
		lab_count,
		week,
		time_start,
		time_end)
		VALUES (
		:curriculum_id,
		:professor_id,
		:subject_id,
		:semester_id,
		:room_id,
		:year,
		:section,
		:units,
		:lec_count,
		:lab_count,
		:week,
		:time_start,
		:time_end)";

		$param = array(
            ':curriculum_id' => $data['curriculum_id'],
			':professor_id' => $data['professor_id'],
			':subject_id' => $data['subject_id'],
			':semester_id' => $data['semester_id'],
			':room_id' => $data['room_id'],
			':year' => $data['year'],
			':section' => $data['section'],
			':units' => $data['units'],
			':lec_count' => $data['lec_count'],
			':lab_count' => $data['lab_count'],
			':week' => $data['week'],
			':time_start' => $data['time_start'],
			':time_end' => $data['time_end']
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $this->db->lastInsertId();
	}
}
