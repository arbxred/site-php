<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/login.css"/>
		<title>Login</title>
	</head>

	<?php
		require_once 'classes/user.php';

		session_start();

		if (isset($_SESSION['logged_in'])) {
			header('Location: index.php');
		};

		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);

			$user_object = new User();

			if (strlen($password) > 6) {
				$hashed_password = md5($password);

				$login_success = $user_object->login($username, $hashed_password);
				if ($login_success) {
					header('Location: index.php');
				}
			}
		}
	?>

	<body style="display:flex; align-items:center; justify-content:center;">
		<div class="login-page">
			<div class="form">
				<form class="login-form" method="POST">
					<h2><i class="fas fa-lock"></i>Login</h2>
					<input type="text" name="username" placeholder="Username" required />
					<input type="password" name="password" placeholder="Password" required/>
					<button type="submit">login</button>
					<p class="message">Not registered? <a href="register.php">Create an account</a></p>
				</form>
			</div>
		</div>
		<script src="assets/js/jquery.min.js"></script>
	</body>
</html>