<?php
class UserModel extends Model
{
	public $userId;
	/* Список пользователей */
	public $list = [];
	/* Текущий пользователь: ассоциативный массив 
	*	с элементами role и name для существующего пользователя
	*	или только с элементом name для неизвестного пользователя
	*/
	public $user = [];

	// public function getList()
	// {
	// 	return unserialize(file_get_contents(USER_DB));
	// }

	public function create()
	{
		try {
			$first_name = $this->db->quote('Nikolaj');
			$last_name = $this->db->quote('Vasetsky');
			$email = $this->db->quote('nikolaj.vasetsky@gmail.com');
			$password = $this->db->quote(crypt('123456', SALT));

			$start0 = microtime(true);

						$user = $this->db->exec("
							INSERT INTO users(first_name, last_name, email, password)
							VALUES ($first_name, $last_name, $email, $password)
						");

						$this->userId = $this->db->lastInsertId();

			$time0 = microtime(true) - $start0;
			printf('Скрипт выполнялся %.8F сек.', $time0);
	// SELECT `email` FROM `tbl_name` WHERE `email` = ?
$start = microtime(true);
$query = $this->db->prepare("
	INSERT INTO users(first_name, last_name, email, password)
	VALUES (:first_name, :last_name, :email, :password)
");
// $query->bindValue( ':first_name', $first_name );
// $query->bindValue( ':last_name', $last_name );
// $query->bindValue( ':email', $email );
// $query->bindValue( ':password', $password );

$query->execute([
	':first_name' => $first_name,
	':last_name' => $last_name,
	':email' => $email,
	':password' => $password,
]);

$this->userId = $this->db->lastInsertId();
			$time = microtime(true) - $start;
			printf('Скрипт выполнялся %.8F сек.', $time);



die;

		} catch(PDOException $e) {
			exit($e->getMessage());
		}
	}

	public function render($file)
	{
		// current file
		ob_start();
		include($file);
		return ob_get_clean();
	}
}