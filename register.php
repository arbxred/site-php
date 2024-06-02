<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/login.css"/>
		<title>Register</title>
	</head>

	<?php
		require_once 'classes/user.php';

		session_start();

		if (isset($_SESSION['logged_in'])) {
			header('Location: index.php');
		};

		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);

			$user_object = new User();

			if (strlen($password) > 6) {
				$hashed_password = md5($password);

				$register_success = $user_object->register($username, $hashed_password);
				if ($register_success) {
					header('Location: login.php');
				};
			}
		}
	?>

	<body style="display:flex; align-items:center; justify-content:center;">
		<div class="login-page">
			<div class="form">
				<form action="register.php" class="register-form" method="POST">
					<h2><i class="fas fa-lock"></i>Register</h2>
					<input type="text" name="username" placeholder="Username" required />
					<input type="password" name="password" placeholder="Password" required />
					<button type="submit">Register</button>
					<p class="message">Already registered? <a href="login.php">Sign In</a></p>
				</form>
			</div>
		</div>
		<script src="assets/js/jquery.min.js"></script>
	</body>
</html>
