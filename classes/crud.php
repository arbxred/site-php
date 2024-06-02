<?php
	require_once '../classes/database.php';
	
	function isValidMd5($md5)
	{
		return preg_match('/^[a-f0-9]{32}$/', $md5);
	};

	class CRUD extends Database {
		private $db;

		public function __construct()
		{
			$this->db = $this->get_connection();
		}
		
		public function get_users()
		{
			$stmt = $this->db->prepare("SELECT * FROM users");
			$stmt->execute();

			$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

			return $result;
		}

		public function create($username, $password)
		{
			$hashed_password = md5($password);

			$stmt = $this->db->prepare("INSERT INTO users(username, password) VALUES(?, ?)");
			$stmt->bind_param("ss", $username, $hashed_password);
			$result = $stmt->execute();

			return $result;
		}

		public function edit($username, $new_username, $password)
		{
			if (!$new_username) {
				$new_username = $username;
			};
			
			if ($password) {
				$hashed_password = md5($password);
				$stmt = $this->db->prepare("UPDATE users SET username = ?, password = ? WHERE username = ?");
				$stmt->bind_param("sss", $new_username, $hashed_password, $username);
			} else {
				$stmt = $this->db->prepare("UPDATE users SET username = ? WHERE username = ?");
				$stmt->bind_param("ss", $new_username, $username);
			}

			$result = $stmt->execute();

			return $result;
		}

		public function delete($username)
		{
			$stmt = $this->db->prepare("DELETE FROM users WHERE username = ?");
			$stmt->bind_param("s", $username);
			$result = $stmt->execute();

			return $result;
		}
	}
?>