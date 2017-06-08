<?php
class Model
{
	protected $db;

	public function __construct()
	{
		try {
			$this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			exit($e->getMessage());
		}
	}

	public function insert($sql)
	{
		try {
			$this->db->exec($sql);
			return $this->db->lastInsertId();
		} catch(PDOException $e) {
			return $this->db->errorInfo();
		}
	}

	public function select($sql)
	{
		try {
			return $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			return $this->db->errorInfo();
		}
	}

	public function selectOne($sql)
	{
		try {
			return $this->db->query($sql)->fetchColumn();
		} catch(PDOException $e) {
			return $this->db->errorInfo();
		}
	}
}