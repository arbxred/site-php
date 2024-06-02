<?php
	require_once '../classes/crud.php';

	$crud_object = new CRUD();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_GET["username"];
		
		$crud_object->delete($username);
	};

	header("Location: index.php");
?>