<?php
class Controller
{

	public function render($file)
	{
		// current file
		ob_start();
		include($file);
		return ob_get_clean();
	}

	// $_SERVER['HTTP_REFERER'] i can't use it..
	public function validate($request, $params, $url = false)
	{
		$errors = [];
		foreach($params as $key_request => $params) {
			foreach( $params as $key_param => $param ) {
				if ( $key_param == 'min' ) {
					if ( strlen($request[$key_request]) < $param ) {
						$errors[] = 'Minimum value for ' . $key_request . ' = ' . $param;
					}
				}
				if ( $key_param == 'max' ) {
					if ( strlen($request[$key_request]) > $param ) {
						$errors[] = 'Maximum value for ' . $key_request . ' = ' . $param;
					}
				}
				if ( $key_param == 'required' ) {
					if ( !empty($request[$key_request]) !== $param ) {
						$errors[] = 'Fiend ' .$key_request. ' is required';
					}
				}
			}
		}

		if ( !empty($errors) && $url ) {
			$_SESSION['error'] = $errors;
			$this->redirect($url);
		}

		return $errors;
	}

    public function redirect($url = '/')
    {
        header("Location: ".HOME_URL.$url);
        exit();
    }
}