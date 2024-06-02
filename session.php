<?php
	session_start();

	$response = [];
	$response["in_session"] = false;

	if (isset($_SESSION["logged_in"])) {
		$response["in_session"] = true;
		$response["id_session"] = $_SESSION["userid"];
	};

	echo(json_encode($response));
?>