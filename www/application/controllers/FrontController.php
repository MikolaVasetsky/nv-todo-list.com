<?php
class FrontController
{
	protected $_controller, $_action, $_params, $_body;
	static $_instance;

	//singleton
	public static function getInstance()
	{
		if(!(self::$_instance instanceof self))
			self::$_instance = new self();
		return self::$_instance;
	}

	private function __construct()
	{
		$request = $_SERVER['REQUEST_URI'];
		$splits = explode('/', trim($request,'/'));

		//get controller
		$this->_controller = !empty($splits[0]) ? ucfirst($splits[0]).'Controller' : 'IndexController';

		//get action
		$this->_action = !empty($splits[1]) ? $splits[1].'Action' : 'indexAction';

		//is there any parameters and their values?
		if ( !empty($splits[2]) ) {
			for ( $i=2, $cnt = count($splits); $i < $cnt; ++$i ){
				$this->_params[] = $splits[$i];
			}
		}
	}

	public function route()
	{
		// need fix class exist
		// vardump(class_exists($this->getController()));
		// die;
		if ( class_exists($this->getController()) ) {
			// get class information
			$rc = new ReflectionClass($this->getController());

			if ( $rc->hasMethod($this->getAction()) ) {
				$controller = $rc->newInstance();
				$method = $rc->getMethod($this->getAction());
				// perform method
				$method->invoke($controller);
			} else {
				self::ErrorPage();
				// throw new Exception("Action");
			}
		} else {
			self::ErrorPage();
			// throw new Exception("Controller");
		}
	}

	public function getParams()
	{
		return $this->_params;
	}

	public function getController()
	{
		return $this->_controller;
	}

	public function getAction()
	{
		return $this->_action;
	}

	public function getBody()
	{
		return $this->_body;
	}

	public function setBody($body)
	{
		$this->_body = $body;
	}

	public static function ErrorPage()
	{
		//need html
	    header("HTTP/1.0 404 Not Found");
	    include(PAGE_404);
        return;
	}
}