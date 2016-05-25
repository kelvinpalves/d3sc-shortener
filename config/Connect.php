<?php

class Connect {

	private $conn;
	private $messsage;

	public function Connect() {
		try {

			$this->conn = new PDO('mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME, Config::DB_USER, Config::DB_PASSWD);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			$this->conn = null;
			$this->messsage = $e->getMessage();
		}
	}

	public function getConn() {
		return $this->conn;
	}

	public function getMessage() {
		return $this->message;
	}

}