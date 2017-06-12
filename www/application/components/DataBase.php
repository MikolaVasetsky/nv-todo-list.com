<?php
class DataBase
{
	public $pdo;

	static $_instance;

	public static function connection()
	{
		if(!(self::$_instance instanceof self))
			self::$_instance = new self();
		return self::$_instance;
	}

	private function __construct()
	{
		try {
			$this->pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			exit($e->getMessage());
		}
	}

	public function insertUpdateDelete($sql)
	{
		try {
			$this->pdo->exec($sql);
			return $this->pdo->lastInsertId();
		} catch(PDOException $e) {
			return $this->pdo->errorInfo();
		}
	}

	public function select($sql)
	{
		try {
			return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			return $this->pdo->errorInfo();
		}
	}

	public function selectOne($sql)
	{
		try {
			return $this->pdo->query($sql)->fetchColumn();
		} catch(PDOException $e) {
			return $this->pdo->errorInfo();
		}
	}
}