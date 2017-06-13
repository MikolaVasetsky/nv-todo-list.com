<?php
class IndexController
{
	public function indexAction()
	{
		//create instance, but get link, because I use singleton
		$fc = FrontController::getInstance();
		// init model
		$model = new FileModel();

		$model->name = "Guest";

		$output = $model->render(PAGE_HOME);

		$fc->setBody($output);
	}
}
