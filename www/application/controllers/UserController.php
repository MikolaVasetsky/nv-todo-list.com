<?php
class UserController extends Controller
{
	private $model;

	public function __construct()
	{
		$this->model = new UserModel();
		if ( isset($_SESSION['session_id']) && $this->model->isLogin() == '1' ) {
			$this->redirect('/');
		}
	}

	public function indexAction()
	{
		//create instance, but get link, because I use singleton
		$fc = FrontController::getInstance();

		$output = $this->render(PAGE_USER);

		$fc->setBody($output);

		session_destroy();
	}

	public function loginAction()
	{
		$this->validate($_POST, [
			'email' => ['min' => 1, 'max' => 255, 'required' => true],
			'password' => ['min' => 3, 'max' => 255, 'required' => true]
		]);

		$userInfo = [
			'email' => $this->model->db->pdo->quote(trim($_POST['email'])),
			'password' => $this->model->db->pdo->quote(crypt(trim($_POST['password']), SALT))
		];

		$userInfo['session_id'] = $this->model->db->pdo->quote(md5(crypt($userInfo['email'].time(), SALT)));

		$result = $this->model->login($userInfo);

		if ( $result > 0 ) {
			$isUpdateSessionId = $this->model->updateSessionId($userInfo);
			if ( !is_array($isUpdateSessionId) ) {
				$_SESSION['session_id'] = $userInfo['session_id'];//not correct
				$this->redirect('/');
			} else {
				$_SESSION['error'] = $isUpdateSessionId[2];
				$this->redirect('/user/');
			}
		} else {
			$_SESSION['error'] = 'Invalid email or password';
			$this->redirect('/user/');
		}
	}

	public function registerAction()
	{
		$this->validate($_POST, [
			'first_name' => ['min' => 2, 'max' => 255, 'required' => true],
			'last_name' => ['min' => 2, 'max' => 255, 'required' => true],
			'email' => ['min' => 3, 'max' => 255, 'required' => true],
			'password' => ['min' => 3, 'max' => 255, 'required' => true],
		], '/user/');

		$userInfo = [
			'first_name' => $this->model->db->pdo->quote($_POST['first_name']),
			'last_name' => $this->model->db->pdo->quote($_POST['last_name']),
			'email' => $this->model->db->pdo->quote($_POST['email']),
			'password' => $this->model->db->pdo->quote(crypt($_POST['password'], SALT))
		];

		$userInfo['session_id'] = $this->model->db->pdo->quote(md5(crypt($userInfo['email'].time(), SALT)));

		$result = $this->model->register($userInfo);

		if ( is_array($result) ) {
			$_SESSION['error'] = $result[2];
			$this->redirect('/user/');
		} else {
			$_SESSION['session_id'] = $userInfo['session_id'];//not correct
			$this->redirect('/');
		}
	}
}