<?php
namespace Mini\Controller;

class LogoutController
{
	public function admin()
	{
		session_start();
		session_destroy();

		header("location: " . URL . "admin");
	}

	public function registrar()
	{
		session_start();
		session_destroy();

		header("location: " . URL . "registrar");
	}
}
