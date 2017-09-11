<?php
namespace Mini\Controller;

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
