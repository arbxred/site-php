<?php
	class Database {
		private $host = 'localhost';
		private $dbname = 'armure_exquise';
		private $username = 'root';
		private $password = '';

		protected $connection;

		protected function get_connection() {
			try {
				$connection = new mysqli(
					$this->host,
					$this->username,
					$this->password,
					$this->dbname
				);

				return $connection;
			} catch(mysqli_sql_exception $e) {
				echo('Database error: ' . $e->getMessage());
			}
		}
	};
?>