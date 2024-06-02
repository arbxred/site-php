<?php
	require_once 'classes/posts.php';
	$posts = new Posts();
	echo(json_encode($posts->get_posts()));
?>