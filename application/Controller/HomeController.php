<?php
namespace Mini\Controller;

use Mini\Controller\Test;

class HomeController
{
	public function index()
	{
		$page_title = "Login";
		require VIEW . 'home/homepage/index.html';
	}

	public function about()
	{
		$page_title = "Login";
		require VIEW . 'home/homepage/about.html';
	}

	public function contact()
	{
		$page_title = "Login";
		require VIEW . 'home/homepage/contact.html';
	}

	public function login()
	{
		header("location:" . URL . "student");
	}

}
