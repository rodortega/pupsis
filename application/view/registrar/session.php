<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['type'] != 'registrar')
{
	session_destroy();
	header("location:" . URL . "registrar");
}
?>