<?php
	require_once './classes/database.php';

	class Posts extends Database {
		private $db;

		public function __construct()
		{
			$this->db = $this->get_connection();
		}
		
		public function get_posts()
		{
			$stmt = $this->db->prepare("SELECT * FROM products");
			$stmt->execute();

			$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

			return $result;
		}
	}
?>