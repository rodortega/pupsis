<?php
namespace Mini\Controller;

use Mini\Controller\Test;

class HomeController
{
	public function index()
	{
		$page_title = "Login";

		require VIEW . '_template/header_guest.php';
		require VIEW . 'home/login_student.php';
		require VIEW . '_template/footer.php';
	}
}
