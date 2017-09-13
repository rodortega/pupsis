<?php
namespace Mini\Controller;

use Mini\Model\Registrar;

use Mini\Libs\JSON;

class RegistrarController
{
	public function add()
	{
		$Registrar = new Registrar();

		if($Registrar->addRegistrar($_POST) > 0)
		{
			$data = array(
				"status" => "success"
			);
		}
		else
		{
			$data = array(
				"status" => "error"
			);
		}

		$JSON = new JSON();
		$JSON->send($data);
	}

	public function edit()
	{
		$Registrar = new Registrar();
		$registrars = $Registrar->updateRegistrar($_POST);

		$data = array(
			"status" => "success"
		);

		$JSON = new JSON();
		$JSON->send($data);
	}
}
