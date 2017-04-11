<?php
session_start();
$SERVER = 'stardock.cs.virginia.edu';
$DATABASE = 'cs4750s17bhg5yd';
$USERNAME = $_POST["username"];
$PASSWORD = $_POST["password"];

$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (mysqli_connect_errno())
  {
  $error = "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else {
    $_SESSION["username"] = $USERNAME;
    $_SESSION["password"] = $PASSWORD;
  }
mysqli_close($con);

?>

<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Sign In Attempt</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">
        <ul class="actions">
          <li><a href="example.php" class="button special">Special</a></li>
          <li><a href="example.php" class="button">Default</a></li>
        </ul>

				<!-- Main -->
					<div id="main">
			<a href="export.php" class="button special">Export Data</a>
            <?php
              if(isset($error)){
                echo $error;
              }else{
                echo "Connection Succesfull";
              }

             ?>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
