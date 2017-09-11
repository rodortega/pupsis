<?php
namespace Mini\Controller;

class ProfessorController
{
	public function index()
	{
		$page_title = "Login";

		require VIEW . '_template/header_guest.php';
		require VIEW . 'home/login_professor.php';
		require VIEW . '_template/footer.php';
	}
}
