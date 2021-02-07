<?php

require_once("new_config.php"); //not necessary (since its in init.php already), only for education purposes

class Database {


	public $connection; // this way the connection is global = available in the entire class, for all the methods, HAS TO BE PUBLIC
	public $db;

	function __construct() {

		$this->db = $this->open_db_connection(); // opens connection automatically

	}

	public function open_db_connection() {

		// $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME); // more OOP approach

		if ($this->connection->connect_errno) {
			die("Database connection failed badly" . $this->connection->connect_errno);
		}

		return $this->connection;

	}

	public function query($sql) {

		// $result = $this->connection->query($sql);
		$result = $this->db->query($sql);

		$this->confirm_query($result);

		return $result;

	}

	private function confirm_query($result) {

		if(!$result) {

			// die("Query Failed" . $this->connection->error);
			die("Query Failed" . $this->db->error);

		}

	}

	// SQL injection ellen kell
	public function escape_string($string) {
		return $this->db->real_escape_string($string);
	}

	// public function the_insert_id() {
	// 	return mysqli_insert_id($this->connection);
	// }

	public function the_insert_id() {
		return $this->db->insert_id;
	}

} // End of Class Database

$database = new Database();

?>