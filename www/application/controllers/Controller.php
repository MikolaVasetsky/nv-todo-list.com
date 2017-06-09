<?php
class Controller
{
	// public function isLoggedIn()
	// {
	// 	if (  ) {
			// if user not login - redirect to login page
	// 	}
	// }

	public function render($file)
	{
		// current file
		ob_start();
		include($file);
		return ob_get_clean();
	}
}