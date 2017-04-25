<?php

session_start();
if (!isset($_SESSION["username"]) || !isset($_SESSION["password"])) {
	header("Location: sign_in.html");
	die();
}

$SERVER = 'stardock.cs.virginia.edu';
$DATABASE = 'cs4750s17bhg5yd';
$USERNAME = $_SESSION["username"];
$PASSWORD = $_SESSION["password"];

?>


<!DOCTYPE HTML>

<html>

	

<head>
	<title>Elements - Stellar by HTML5 UP</title>
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
			<h1>Add a Show</h1>
			<br>
		</header>

		<!-- Main -->
		<div id="main">

			<!-- Content -->
			<section id="content" class="main">


				<section>
					
					<form method="post" action="insert.php">
						<div class="row uniform">
							<h4>Artist Name</h4>
							<div class="12u 12u$(medium)" style="padding-top: 0px">
								<input type="text" name="artist-name" id="artist-name" required />
							</div>
							<h4>Venue</h4>
							<div class="12u 12u$(medium)" style="padding-top: 0px">
								<input type="text" name="venue-name" id="venue-name" required />
							</div>
							<h4>Name of Tour (if part of a tour)</h4>
							<div class="12u 12u$(xsmall)" style="padding-top: 0px">
								<input type="text" name="tour-name" id="tour-name" />
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
									<li><input type="submit" value="Add Show" class="special" /></li>
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