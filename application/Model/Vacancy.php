<?php
namespace Mini\Model;

use Mini\Core\Model;

class Vacancy extends Model
{
	public function getVacanciesByRoomId($room_id)
	{
		$sql = "
		SELECT classes.*, rooms.name, courses.code as course_code, subjects.code as subject_code
		FROM classes
		LEFT JOIN rooms
		ON rooms.id = classes.room_id
		LEFT JOIN curriculums
		ON curriculums.id = classes.curriculum_id
		LEFT JOIN courses
		ON courses.id = curriculums.course_id
		LEFT JOIN subjects
		ON subjects.id = classes.subject_id
		WHERE classes.room_id = :room_id";

		$params = array(
			":room_id" => $room_id
		);

		$query = $this->db->prepare($sql);
        $query->execute($params);

        return $query->fetchAll();
	}

	public function getVacanciesByProfessorId($professor_id)
	{
		$sql = "
		SELECT classes.*, rooms.name, courses.code as course_code, subjects.code as subject_code
		FROM classes
		LEFT JOIN rooms
		ON rooms.id = classes.room_id
		LEFT JOIN curriculums
		ON curriculums.id = classes.curriculum_id
		LEFT JOIN courses
		ON courses.id = curriculums.course_id
		LEFT JOIN subjects
		ON subjects.id = classes.subject_id
		WHERE classes.professor_id = :professor_id";

		$params = array(
			":professor_id" => $professor_id
		);

		$query = $this->db->prepare($sql);
        $query->execute($params);

        return $query->fetchAll();
	}

	public function updateVacancy($data)
	{
		$sql = "
		UPDATE classes
		SET time_start = :time_start,
			time_end = :time_end,
			week = :week
		WHERE id = :id";

		$params = array(
			":time_start" => $data['time_start'],
			":time_end" => $data['time_end'],
			":week" => $data['week'],
			":id" => $data['id']
		);

		$query = $this->db->prepare($sql);
        return $query->execute($params);
	}

	public function validateSchedule($room_id,$week,$time_start,$time_end)
	{
		$sql = "
		SELECT COUNT(*) as count_classes
		FROM classes
		WHERE week = :week
		AND room_id = :room_id
		AND (:time_start BETWEEN time_start AND time_end
		OR :time_end  BETWEEN time_start AND time_end)";

		$params = array(
			":time_start" => $time_start,
			":time_end" => $time_start,
			":week" => $week,
			":room_id" => $room_id
		);

		$query = $this->db->prepare($sql);
        $query->execute($params);

        return $query->fetch();
	}
}
