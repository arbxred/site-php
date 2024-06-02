<?php
	require_once '../classes/crud.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$crud_object = new CRUD();

		$username = $_POST["username"];
		$new_username = $_POST["new_username"];
		$password = $_POST["password"];
		
		$crud_object->edit($username, $new_username, $password);
	};
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit User</title>
	</head>

	<body>
		<h1>Edit User</h1>

		<form method="post">
			<label for="name">Username:</label>
			<input type="text" name="username" id="username" value=<?php echo $_GET["username"] ?> required><br>
			<label for="name">New Username:</label>
			<input type="text" name="new_username" id="new_username"><br>
			<label for="password">New Password:</label>
			<input type="password" name="password" id="password"><br>
			<button type="submit">Create</button>
		</form>
		<a href="index.php">Back</a>
	</body>
</html>