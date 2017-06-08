<?php
class UserController extends Controller implements IController
{
	public function indexAction()
	{
		//create instance, but get link, because I use singleton
		$fc = FrontController::getInstance();

		// init model
		$model = new UserModel();

		$output = $model->render(USER_LOGIN_FILE);

		$fc->setBody($output);

		session_destroy();
	}

	public function loginAction()
	{
		$userModel = new UserModel();
		$result = $userModel->login();

		if ( $result > 0 ) {
			//need set in logged in other info
			$_SESSION['logged_in'] = $result;
			header('Location: '.HOME_URL);
		} else {
			$_SESSION['error'] = 'ERROR: Invalid email or password';
			header('Location: '.HOME_URL.'/user/');
		}
	}

	public function registerAction()
	{
		$userModel = new UserModel();
		$result = $userModel->register();

		if ( is_array($result) ) {
			//need set in logged in other info
			$_SESSION['error'] = $result[2];
			header('Location: '.HOME_URL.'/user/');
		} else {
			$_SESSION['logged_in'] = $result;
			header('Location: '.HOME_URL);
		}
	}
}