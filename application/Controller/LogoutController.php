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
}
