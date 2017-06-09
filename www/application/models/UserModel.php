<?php
class UserModel extends Model
{
	public function register()
	{
		try {
			$first_name = $this->db->quote('Nikolaj');
			$last_name = $this->db->quote('Vasetsky');
			$email = $this->db->quote('nikolaj.vasetsky@gmail.com');
			$password = $this->db->quote(crypt('123456', SALT));

			return $this->insert("
				INSERT INTO users(first_name, last_name, email, password)
				VALUES ($first_name, $last_name, $email, $password)
			");

		} catch(PDOException $e) {
			exit($e->getMessage());
		}
	}

	public function login()
	{
		try {
			$email = $this->db->quote(trim($_POST['email']));
			$password = $this->db->quote(crypt(trim($_POST['password']), SALT));

			return $this->selectOne("
				SELECT count(*)
				FROM users
				WHERE email = $email
				AND password = $password
				LIMIT 1
			");
		} catch(PDOException $e) {
			exit($e->getMessage());
		}
	}
}