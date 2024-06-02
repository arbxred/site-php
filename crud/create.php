<?php
	require_once '../classes/crud.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$crud_object = new CRUD();

		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$crud_object->create($username, $password);
	};
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Create User</title>
	</head>

	<body>
		<h1>Create User</h1>

		<form method="post">
			<label for="name">Username:</label>
			<input type="text" name="username" id="username" required><br>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" required><br>
			<button type="submit">Create</button>
		</form>
		<a href="index.php">Back</a>
	</body>
</html>