<?php
// Default to search for files
set_include_path(get_include_path()
					.PATH_SEPARATOR.'application/controllers'
					.PATH_SEPARATOR.'application/models'
					.PATH_SEPARATOR.'application/core'
					.PATH_SEPARATOR.'application/views');

require_once('helpers.php');
require_once('config.php');

// autoloader class
function __autoload($class){
	require_once($class.'.php');
}

// думал переместить это в core и переименовать в роуте, но думаю так правильней.
// Initialize and start FrontController
$front = FrontController::getInstance();
$front->route();

// Data output
echo $front->getBody();