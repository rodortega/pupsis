<?php
namespace Mini\Model;

use Mini\Core\Model;

class Classer extends Model
{
	public function getClassesById($id)
	{
		$sql = "
		SELECT *
		FROM classes
		WHERE id = :id";

		$param = array(
            ':id' => $id
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetch();
	}

	public function getAllClassesBySet(array $data)
	{
		$sql = "
		SELECT 	classes.id, classes.year, classes.section, classes.units, classes.lec_count, classes.lab_count, classes.week, TIME_FORMAT(classes.time_start, '%h:%i %p') as time_start, TIME_FORMAT(classes.time_end, '%h:%i %p') as time_end,
		 		professors.firstname, professors.lastname,
		 		subjects.id as subject_id, subjects.code as subject_code, subjects.name as subject_name,
		 		rooms.name as room_name
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

	public function getOtherClassesBySubject($class_id,$subject_id,$semester_id)
	{
		$sql = "
		SELECT 	classes.id, classes.year, classes.section, classes.units, classes.lec_count, classes.lab_count, classes.week, TIME_FORMAT(classes.time_start, '%h:%i %p') as time_start, TIME_FORMAT(classes.time_end, '%h:%i %p') as time_end,
 		professors.firstname, professors.lastname,
 		subjects.id as subject_id, subjects.code as subject_code, subjects.name as subject_name,
 		rooms.name as room_name
		FROM classes
			LEFT JOIN professors
			ON professors.id = classes.professor_id
			LEFT JOIN subjects
			ON subjects.id = classes.subject_id
			LEFT JOIN rooms
			ON rooms.id = classes.room_id
		WHERE classes.subject_id = :subject_id
		AND classes.semester_id = :semester_id
		AND classes.id != :class_id";

        $param = array(
        	'class_id' => $class_id,
            ':subject_id' => $subject_id,
            ':semester_id' => $semester_id
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

	public function deleteClass($id)
	{
		$sql = "
		DELETE FROM classes
		WHERE id = :id";

		$param = array(
			":id" => $id
		);

        $query = $this->db->prepare($sql);
        return $query->execute($param);
	}
}
