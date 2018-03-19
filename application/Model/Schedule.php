<?php
namespace Mini\Model;

use Mini\Core\Model;

class Schedule extends Model
{
	public function getScheduleByStudentId($student_id)
	{
		$sql = "
		SELECT 	schedules.id,
				classes.subject_id, classes.year, classes.section, classes.units, classes.lec_count, classes.lab_count, classes.week, classes.time_start, classes.time_end,
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
			WHERE schedules.status = '1'
			AND student_id = :student_id";

        $param = array(
            ':student_id' => $student_id
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
	}

	public function getGradesByStudentId($student_id)
	{
		$sql = "
		SELECT 	schedules.id, schedules.grade, schedules.mark,
				classes.subject_id, classes.year, classes.section, classes.units, classes.lec_count, classes.lab_count, classes.week, classes.time_start, classes.time_end, classes.semester_id,
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
			WHERE student_id = :student_id
			ORDER BY classes.year DESC, classes.semester_id DESC";

        $param = array(
            ':student_id' => $student_id
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
	}

	public function getScheduleByProfessorId($professor_id,$semester_id)
	{
		$sql = "
		SELECT classes.*, rooms.name as room_name, courses.code as course_code, subjects.code as subject_code
		FROM classes
		LEFT JOIN rooms
		ON rooms.id = classes.room_id
		LEFT JOIN curriculums
		ON curriculums.id = classes.curriculum_id
		LEFT JOIN courses
		ON courses.id = curriculums.course_id
		LEFT JOIN subjects
		ON subjects.id = classes.subject_id
		WHERE classes.professor_id = :professor_id
		AND classes.semester_id = :semester_id";

		$param = array(
            ':professor_id' => $professor_id,
            'semester_id' => $semester_id
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
	}

	public function getFailedSchedule($student_id)
	{
		$sql = "
		SELECT 	schedules.id,
				classes.id as class_id, classes.subject_id, classes.year, classes.section, classes.semester_id, classes.units, classes.lec_count, classes.lab_count, classes.week, TIME_FORMAT(classes.time_start, '%h:%i %p') as time_start, TIME_FORMAT(classes.time_end, '%h:%i %p') as time_end,
		 		professors.firstname, professors.lastname,
		 		subjects.id as subject_id, subjects.code as subject_code, subjects.name as subject_name,
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

	public function getScheduleByClassId($schedule_id)
	{
		$sql = "
		SELECT
		students.firstname, students.middlename, students.lastname,
		subjects.code, subjects.name,
		schedules.id, schedules.mark, schedules.grade
		FROM schedules
		LEFT JOIN classes
		ON classes.id = schedules.class_id
		LEFT JOIN subjects
		ON subjects.id = classes.subject_id
		LEFT JOIN students
		ON students.id = schedules.student_id
		WHERE schedules.id = :schedule_id";

		$param = array(
            ':schedule_id' => $schedule_id
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetch();
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

	public function encodeGrade($schedule_id,$grade,$mark,$status)
	{
		$sql = "
		UPDATE schedules
		SET grade = :grade,
		mark = :mark,
		status = :status
		WHERE id = :schedule_id";

		$param = array(
            ':schedule_id' => $schedule_id,
            ':grade' => $grade,
            ':mark' => $mark,
            ':status' => $status,
        );

        $query = $this->db->prepare($sql);
        return $query->execute($param);
	}
}
