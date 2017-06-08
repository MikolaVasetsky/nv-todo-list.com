<?php
class UserController extends Controller implements IController
{
	public function loginAction()
	{
		//create instance, but get link, because I use singleton
		$fc = FrontController::getInstance();

		// init model
		$model = new UserModel();

		$output = $model->render(USER_LOGIN_FILE);

		$fc->setBody($output);
	}

	public function registerAction()
	{
		//create instance, but get link, because I use singleton
		$fc = FrontController::getInstance();

		// init model
		$model = new UserModel();

		$output = $model->render(USER_REGISTER_FILE);

		$fc->setBody($output);
	}

	public function createAction()
	{
		$model = new UserModel();
		$model->create();
		var_dump($model->userId);
		die;
	}

	// public function listAction()
	// {
	// 	//create instance, but get link, because I use singleton
	// 	$fc = FrontController::getInstance();

	// 	// init model
	// 	$model = new UserModel();

	// 	$model->list = $model->getList();

	// 	$output = $model->render(USER_LIST_FILE);

	// 	$fc->setBody($output);
	// }
}
