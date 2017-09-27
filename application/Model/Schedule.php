<?php
namespace Mini\Model;

use Mini\Core\Model;

class Schedule extends Model
{
	public function getFailedSchedule($student_id)
	{
		$sql = "
		SELECT 	schedules.id,
				classes.subject_id, classes.year, classes.section, classes.units, classes.lec_count, classes.lab_count, classes.week, TIME_FORMAT(classes.time_start, '%h:%i %p') as time_start, TIME_FORMAT(classes.time_end, '%h:%i %p') as time_end,
		 		professors.firstname, professors.lastname,
		 		subjects.code as subject_code, subjects.name as subject_name,
		 		rooms.name as room_name
		FROM schedules
			LEFT JOIN classes
			ON classes.id = schedules.class_id
			LEFT JOIN professors
			ON professors.id = classes.professor_id
			LEFT JOIN subjects
			ON subjects.id = classes.subject_id
			LEFT JOIN rooms
			ON rooms.id = classes.room_id
			WHERE schedules.status = '0'
			AND student_id = :student_id";

        $param = array(
            ':student_id' => $student_id
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
	}

	public function addSchedule(array $data)
	{
		$sql = "
		INSERT INTO schedules (student_id, class_id,status)
		VALUES (:student_id, :class_id, '1')";

		$param = array(
            ':student_id' => $data['student_id'],
            ':class_id' => $data['class_id']
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $this->db->lastInsertId();
	}

	public function activateSchedule(array $data)
	{
		$sql = "
		UPDATE schedules
		SET mark = NULL,
		grade = NULL,
		status = '1'
		WHERE student_id = :student_id
		AND class_id = :class_id";

		$param = array(
            ':student_id' => $data['student_id'],
            ':class_id' => $data['class_id']
        );

        $query = $this->db->prepare($sql);
        return $query->execute($param);
	}
}
