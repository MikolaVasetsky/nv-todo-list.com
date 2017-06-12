<?php
class UserModel extends Model
{
	public function register($userInfo)
	{
		return $this->db->insertUpdateDelete("
			INSERT INTO users(first_name, last_name, email, password, session_id)
			VALUES (".$userInfo['first_name'].", ".$userInfo['last_name'].", ".$userInfo['email'].", ".$userInfo['password'].", ".$userInfo['session_id'].")
		");
	}

	public function login($userInfo)
	{
		return $this->db->selectOne("
			SELECT id
			FROM users
			WHERE email = ".$userInfo['email']."
			AND password = ".$userInfo['password']."
			LIMIT 1
		");
	}

	public function updateSessionId($userInfo)
	{
		return $this->db->insertUpdateDelete("
			UPDATE users
			SET session_id = ".$userInfo['session_id']."
			WHERE email = ".$userInfo['email']."
		");
	}

	public function isLogin()
	{
		return $this->db->selectOne("
			SELECT count(*)
			FROM users
			WHERE session_id = ".$_SESSION['session_id']."
			LIMIT 1
		");
	}
}