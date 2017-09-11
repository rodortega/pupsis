<?php

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);
define('VIEW', ROOT . 'application/view' . DIRECTORY_SEPARATOR);

function jsend($json){
	header('Content-Type: application/json');
	echo json_encode($json);
}

require ROOT . 'vendor/autoload.php';
require APP . 'config/config.php';

use Mini\Core\Application;

$app = new Application();
