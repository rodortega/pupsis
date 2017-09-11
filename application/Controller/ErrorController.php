<?php
namespace Mini\Controller;

class ErrorController
{
	public function index()
	{
		$page_title = "Page Not Found";

		require VIEW . '_template/header_guest.php';
		require VIEW . 'error/404.php';
		require VIEW . '_template/footer.php';
	}
}
