<?php
namespace Mini\Controller;

use Mini\Libs\Validator;
use Mini\Libs\Crypto;

class HomeController
{
	public function index()
	{
		require VIEW . '_template/header.php';
		require VIEW . 'home/index.php';
		require VIEW . '_template/footer.php';
	}
}
