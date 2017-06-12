<?php
require_once('application/components/helpers.php');
require_once('application/components/config.php');

// autoloader class
function __autoload($class){
	require_once($class.'.php');
}

// Initialize and start FrontController
$front = FrontController::getInstance();
$front->route();

// Data output
echo $front->getBody();