<?php
class Model
{
	public $db;

	public function __construct()
	{
		$this->db = DataBase::connection();
	}
}