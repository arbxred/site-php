<?php
	require_once '../classes/crud.php';
	$CRUD = new CRUD();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Users List</title>
	</head>
	<body>
		<h1>Users List</h1>

		<a href="create.php">Create New User</a>

		<table>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Actions</th>
			</tr>

			<?php
				foreach ($CRUD->get_users() as $user) {
					echo "<tr>";
					echo "<td>".$user['id']."</td>";
					echo "<td>".$user['username']."</td>";
					echo "<td><a href=\"edit.php?username=$user[username]\">Edit</a> | 
					<a href=\"delete.php?username=$user[username]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
				}
			?>
		</table>
		<a href="../index.php">Back</a>
	</body>
</html>
