-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5174
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for pupsis
DROP DATABASE IF EXISTS `pupsis`;
CREATE DATABASE IF NOT EXISTS `pupsis` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pupsis`;

-- Dumping structure for table pupsis.admins
DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table pupsis.admins: ~0 rows (approximately)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `username`, `password`, `firstname`, `lastname`, `status`) VALUES
	(1, 'admin', 'admin', 'Administrator', 'is Life', 1);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table pupsis.classes
DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curriculum_id` int(11) NOT NULL,
  `professor_id` int(11) DEFAULT NULL,
  `subject_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `year` tinyint(1) NOT NULL,
  `section` tinyint(1) NOT NULL,
  `units` tinyint(1) NOT NULL DEFAULT '3',
  `lec_count` tinyint(1) NOT NULL DEFAULT '0',
  `lab_count` tinyint(1) NOT NULL DEFAULT '0',
  `week` varchar(50) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_class_professors` (`professor_id`),
  KEY `FK_classes_subjects` (`subject_id`),
  KEY `FK_classes_semesters` (`semester_id`),
  KEY `FK_classes_rooms` (`room_id`),
  KEY `FK_class_curriculums` (`curriculum_id`),
  CONSTRAINT `FK_class_curriculums` FOREIGN KEY (`curriculum_id`) REFERENCES `curriculums` (`id`),
  CONSTRAINT `FK_class_professors` FOREIGN KEY (`professor_id`) REFERENCES `professors` (`id`),
  CONSTRAINT `FK_classes_rooms` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  CONSTRAINT `FK_classes_semesters` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`),
  CONSTRAINT `FK_classes_subjects` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table pupsis.classes: ~3 rows (approximately)
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` (`id`, `curriculum_id`, `professor_id`, `subject_id`, `semester_id`, `room_id`, `year`, `section`, `units`, `lec_count`, `lab_count`, `week`, `time_start`, `time_end`, `status`) VALUES
	(7, 3, 1, 1, 1, 3, 1, 1, 3, 3, 5, 'Wednesday', '09:00:00', '12:00:00', 1),
	(8, 3, 1, 3, 1, 4, 1, 1, 3, 3, 5, 'Thursday', '09:00:00', '12:00:00', 1),
	(9, 3, 1, 4, 2, 4, 1, 1, 3, 3, 5, 'Thursday', '09:00:00', '12:00:00', 1);
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;

-- Dumping structure for table pupsis.courses
DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table pupsis.courses: ~0 rows (approximately)
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`id`, `code`, `name`) VALUES
	(1, 'BSIT', 'Bachelor of Science in Information Technology'),
	(2, 'BSIE', 'Bachelor of Science in Industrial Engineering');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;

-- Dumping structure for table pupsis.curriculums
DROP TABLE IF EXISTS `curriculums`;
CREATE TABLE IF NOT EXISTS `curriculums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_courses_schools` (`school_id`),
  KEY `FK_curriculums_courses` (`course_id`),
  CONSTRAINT `FK_courses_schools` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  CONSTRAINT `FK_curriculums_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table pupsis.curriculums: ~3 rows (approximately)
/*!40000 ALTER TABLE `curriculums` DISABLE KEYS */;
INSERT INTO `curriculums` (`id`, `school_id`, `course_id`) VALUES
	(1, 1, 1),
	(3, 2, 1),
	(5, 2, 2);
/*!40000 ALTER TABLE `curriculums` ENABLE KEYS */;

-- Dumping structure for table pupsis.prerequisites
DROP TABLE IF EXISTS `prerequisites`;
CREATE TABLE IF NOT EXISTS `prerequisites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `pre_subject_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_prerequisites_subjects` (`subject_id`),
  KEY `FK_prerequisites_subjects_2` (`pre_subject_id`),
  CONSTRAINT `FK_prerequisites_subjects` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  CONSTRAINT `FK_prerequisites_subjects_2` FOREIGN KEY (`pre_subject_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table pupsis.prerequisites: ~1 rows (approximately)
/*!40000 ALTER TABLE `prerequisites` DISABLE KEYS */;
INSERT INTO `prerequisites` (`id`, `subject_id`, `pre_subject_id`) VALUES
	(2, 4, 3);
/*!40000 ALTER TABLE `prerequisites` ENABLE KEYS */;

-- Dumping structure for table pupsis.professors
DROP TABLE IF EXISTS `professors`;
CREATE TABLE IF NOT EXISTS `professors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `user_code` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_professors_schools` (`school_id`),
  CONSTRAINT `FK_professors_schools` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table pupsis.professors: ~1 rows (approximately)
/*!40000 ALTER TABLE `professors` DISABLE KEYS */;
INSERT INTO `professors` (`id`, `school_id`, `user_code`, `password`, `email`, `firstname`, `middlename`, `lastname`, `gender`, `city`, `province`, `address`, `telephone`, `mobile`, `birthdate`, `status`) VALUES
	(1, 2, '2017-55555-SR-0', 'asdasd', 'rodrod@gmail.com', 'Doctor', 'Albus', 'Strange', 'm', 'San Pedro', 'Laguna', '123 Elmer Street', '520-12-12', '09123654789', '1996-05-05', 1);
/*!40000 ALTER TABLE `professors` ENABLE KEYS */;

-- Dumping structure for table pupsis.registrars
DROP TABLE IF EXISTS `registrars`;
CREATE TABLE IF NOT EXISTS `registrars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `user_code` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_registrars_schools` (`school_id`),
  CONSTRAINT `FK_registrars_schools` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table pupsis.registrars: ~2 rows (approximately)
/*!40000 ALTER TABLE `registrars` DISABLE KEYS */;
INSERT INTO `registrars` (`id`, `school_id`, `user_code`, `password`, `email`, `firstname`, `middlename`, `lastname`, `gender`, `city`, `province`, `address`, `telephone`, `mobile`, `birthdate`, `status`) VALUES
	(1, 1, '2017-01234-SR-0', 'asdasd', NULL, 'Elvis', 'Magi', 'Presley', 'm', 'San Pedro', 'Laguna', '123 Jackavillage St.', '520-12-12', '09123456789', '1996-05-05', 1),
	(2, 2, '2017-99999-SR-0', 'asdasd', 'rod@gmail.com', 'James', 'Yahoo', 'Fox', 'f', 'San Pedro', 'Laguna', '12 Graveyard Street', '520-12-12', '09321654897', '1996-05-05', 1);
/*!40000 ALTER TABLE `registrars` ENABLE KEYS */;

-- Dumping structure for table pupsis.rooms
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_rooms_schools` (`school_id`),
  CONSTRAINT `FK_rooms_schools` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table pupsis.rooms: ~6 rows (approximately)
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` (`id`, `school_id`, `name`) VALUES
	(3, 2, 'A1'),
	(4, 2, 'A2'),
	(5, 2, 'A3'),
	(7, 2, 'A4'),
	(9, 2, 'A5');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;

-- Dumping structure for table pupsis.schedules
DROP TABLE IF EXISTS `schedules`;
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `mark` varchar(3) DEFAULT NULL,
  `grade` decimal(3,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_schedules_classes` (`class_id`),
  KEY `FK_schedules_students` (`student_id`),
  CONSTRAINT `FK_schedules_classes` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  CONSTRAINT `FK_schedules_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table pupsis.schedules: ~2 rows (approximately)
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` (`id`, `student_id`, `class_id`, `mark`, `grade`, `status`) VALUES
	(21, 1, 7, 'P', 1.25, 2),
	(22, 1, 8, 'F', 5.00, 0);
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;

-- Dumping structure for table pupsis.schools
DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table pupsis.schools: ~3 rows (approximately)
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;
INSERT INTO `schools` (`id`, `name`, `description`) VALUES
	(1, 'PUPSRC', 'Polytechnic University of the Philippines Santa Rosa Campus'),
	(2, 'PUPSMC', 'Polytechnic University of the Philippines Santa Mesa Campus'),
	(3, 'PUPSSL', 'Polyshetshet');
/*!40000 ALTER TABLE `schools` ENABLE KEYS */;

-- Dumping structure for table pupsis.semesters
DROP TABLE IF EXISTS `semesters`;
CREATE TABLE IF NOT EXISTS `semesters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table pupsis.semesters: ~2 rows (approximately)
/*!40000 ALTER TABLE `semesters` DISABLE KEYS */;
INSERT INTO `semesters` (`id`, `name`) VALUES
	(1, 'First'),
	(2, 'Second'),
	(3, 'Summer');
/*!40000 ALTER TABLE `semesters` ENABLE KEYS */;

-- Dumping structure for table pupsis.students
DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curriculum_id` int(11) NOT NULL,
  `user_code` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `join_year` smallint(4) NOT NULL,
  `section` smallint(4) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_students_curriculums` (`curriculum_id`),
  CONSTRAINT `FK_students_curriculums` FOREIGN KEY (`curriculum_id`) REFERENCES `curriculums` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='status:\r\n0 - banned\r\n1 - active\r\n2 - enrolled';

-- Dumping data for table pupsis.students: ~3 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `curriculum_id`, `user_code`, `password`, `email`, `firstname`, `middlename`, `lastname`, `gender`, `city`, `province`, `address`, `telephone`, `mobile`, `birthdate`, `join_year`, `section`, `status`) VALUES
	(1, 3, '2017-01213-SR-0', 'asdasd', 'rodcarlos2121@gmail.com', 'Rod Carlos', 'Alvarez', 'Ortega', 'm', 'San Pedro', 'Laguna', '340 Mendoza Street, San Roque San Pedro Laguna', '520-12-12', '09359972481', '1996-05-05', 2017, 1, 2),
	(2, 1, '2017-77777-SR-0', 'asdasd', NULL, 'Kevin', 'Jumpee', 'Klein', 'f', 'San Pedro', 'Laguna', '222 Binay Street, Barangay Jaypolo', '520-58-58', '0932178954', '1996-05-05', 2017, 1, 1),
	(3, 3, '2017-78945-SR-0', 'asdasd', NULL, 'Elise Andrea', 'Cahilig', 'Lazatin', 'f', 'San Pedro', 'Laguna', '111 Magnolia Street', '520-10-10', '09359972481', '1996-05-05', 2017, 1, 1);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Dumping structure for table pupsis.subjects
DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table pupsis.subjects: ~3 rows (approximately)
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` (`id`, `code`, `name`) VALUES
	(1, 'COMP123', 'Advanced Programming 2'),
	(3, 'PROG1', 'Introduction to Turbo C'),
	(4, 'PROG2', 'Web Programming');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;

-- Dumping structure for table pupsis.system
DROP TABLE IF EXISTS `system`;
CREATE TABLE IF NOT EXISTS `system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semester_id` int(11) NOT NULL,
  `is_encoding` char(1) NOT NULL,
  `is_registration` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_system_semesters` (`semester_id`),
  CONSTRAINT `FK_system_semesters` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table pupsis.system: ~1 rows (approximately)
/*!40000 ALTER TABLE `system` DISABLE KEYS */;
INSERT INTO `system` (`id`, `semester_id`, `is_encoding`, `is_registration`) VALUES
	(1, 1, '1', '1');
/*!40000 ALTER TABLE `system` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
