<?php

session_start();
$SERVER = 'stardock.cs.virginia.edu';
$DATABASE = 'cs4750s17bhg5yd';
$USERNAME = $_SESSION["username"];
$PASSWORD = $_SESSION["password"];

if (!isset($USERNAME) || !isset($PASSWORD)) {
	header("Location: sign_in.php");
	die();
}

$conn = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);


$sql1 = $conn->prepare("DELETE FROM shows WHERE date_played = ? AND doors_open = ? AND venue_name = ?");
	if(!$sql1){
		mysqli_close($conn);
	  	$message = urlencode("Invalid Credentials to View this Page");
	  	header('Location: index.php?msg='.$message);
	  	exit();
	}
mysqli_close($conn);

?>


<!DOCTYPE HTML>

<html>

<head>
	<title>Delete Show</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="myStyle.css" />
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>

<body>

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header">
			<h1>Delete a Show</h1>
		</header>

		<!-- Main -->
		<div id="main">
			<nav id="nav">
			<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="query.php">Search Shows</a><li>
							<li><a href="delete_show.php">Delete Show</a><li>
							<li><a href="insert_show.php">Insert Show</a></li>
							<li><a href="update_show.php">Update Show</a></li>
						</ul>
						</nav>
			<!-- Content -->
			<section id="content" class="main">


				<section>
					<h2>Form</h2>
					<form method="post" action="delete.php">
						<div class="row uniform">
							<h4>Venue</h4>
							<div class="12u 12u$(medium)" style="padding-top: 0px">
								<input type="text" name="venue-name" id="venue-name" placeholder="Venue" required />
							</div>
							<h4>Date</h4>
							<div class="12u 12u$(xsmall)" style="padding-top: 0px">
								<input type="date" name="date" id="date" required />
							</div>

							<h4>Start Time</h4>
							<div class="12u 12u$(xsmall)" style="padding-top: 0px">
								<input type="time" name="time" id="time" required/>
							</div>

							<div class="12u$">
								<ul class="actions">
									<li><input type="submit" value="Delete Show" class="special" /></li>
									<li><input type="reset" value="Clear" /></li>
								</ul>
							</div>
						</div>
					</form>
				</section>

			</section>

		</div>

		<!-- Footer -->
		<footer id="footer">
			<p class="copyright">&copy; Live Music DB: <a href="https://html5up.net">HTML5 UP</a>.</p>
		</footer>

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
