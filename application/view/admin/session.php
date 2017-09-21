<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['type'] != 'admin')
{
	session_destroy();
	header("location:" . URL . "admin");
}
?>