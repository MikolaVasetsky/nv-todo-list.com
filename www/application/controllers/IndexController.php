<?php
class IndexController implements IController
{
	public function indexAction()
	{
		//create instance, but get link, because I use singleton
		$fc = FrontController::getInstance();
		// init model
		$model = new FileModel();

		$model->name = "Guest";

		$output = $model->render(USER_DEFAULT_FILE);

		$fc->setBody($output);
	}
}
