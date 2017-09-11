<?php
namespace Mini\Controller;

class AdminController
{
	public function index()
	{
		$page_title = "Admin Login";

		require VIEW . '_template/header_guest.php';
		require VIEW . 'home/login_admin.php';
		require VIEW . '_template/footer.php';
	}
}
