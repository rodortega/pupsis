<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['type'] != 'professor')
{
	session_destroy();
	header("location:" . URL . "professor");
}
?>