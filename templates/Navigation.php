<?php
	class Navigation {
		public function render() {
			echo '
			<nav id="nav">
				<ul class="links">
					<li class="active"><a href="index.php">SHOP</a></li>
					<li class="login"><a id="loginButton" href="login.php">Login</a></li>
					<li class="admin"><a id="adminButton" href="crud/index.php">Admin</a></li>
				</ul>
			</nav>
			';
		}
	}
?>