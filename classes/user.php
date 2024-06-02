<?php
	require_once './classes/database.php';

	class User extends Database {
		private $db;

		public function __construct()
		{
			$this->db = $this->get_connection();
		}

		public function exist($username)
		{
			$stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$result = $stmt->get_result();
			
			if ($result->num_rows > 0) {
				return true;
			};

			return false;
		}

		public function login($username, $password)
		{
			try {
				if (!$this->exist($username)) {
					return false;
				};
			
				$stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
				$stmt->bind_param("s", $username);
				$stmt->execute();
				
				$result = $stmt->get_result()->fetch_assoc();

				if ($password == $result["password"]) {
					$_SESSION["logged_in"] = true;
					$_SESSION["username"] = $result["password"];
					$_SESSION["userid"] = $result["id"];

					return true;
				};

				return false;
			} catch(mysqli_sql_exception $e) {
				echo("User tried login:" . $e->getMessage());
			};
		}

		
		public function register($username, $password)
		{
			try {
				if ($this->exist($username)) {
					return false;
				};

				$stmt = $this->db->prepare("INSERT INTO users(username, password) VALUES(?, ?)");
				$stmt->bind_param("ss", $username, $password);
				$result = $stmt->execute();

				if ($result) {
					return true;
				};

				return false;
			} catch(mysqli_sql_exception $e) {
				echo("User tried register:" . $e->getMessage());
			};
		}
	};
?>