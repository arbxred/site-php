<?php
	require_once 'templates/Header.php';
	require_once 'templates/Navigation.php';
	require_once 'templates/MainContent.php';
	require_once 'templates/Footer.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Armure Exquise</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <noscript>
    <link rel="stylesheet" href="assets/css/noscript.css" />
  </noscript>
</head>

<body class="is-preload">
  <div id="wrapper" class="fade-in">

    <!-- Render Components -->
    <?php
				$header = new Header();
				$header->render();

				$navigation = new Navigation();
				$navigation->render();

				$mainContent = new MainContent();
				$mainContent->render();

				$footer = new Footer();
				$footer->render();
			?>

  </div>

  <!-- Scripts -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery.scrollex.min.js"></script>
  <script src="assets/js/jquery.scrolly.min.js"></script>
  <script src="assets/js/browser.min.js"></script>
  <script src="assets/js/breakpoints.min.js"></script>
  <script src="assets/js/util.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/logout.js"></script>
</body>

</html>