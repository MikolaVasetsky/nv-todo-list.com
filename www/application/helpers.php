<?php
if(!session_id()) {
	session_start();
}

function url() {
	return sprintf(
		"%s://%s",
		isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		$_SERVER['SERVER_NAME']
	);
}

function vardump($str) {
	var_dump('<pre>');
	var_dump($str);
	var_dump('</pre>');
}