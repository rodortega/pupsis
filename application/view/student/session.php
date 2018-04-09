<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['type'] != 'student')
{
	session_destroy();
	header("location:" . URL . "student");
}
?>