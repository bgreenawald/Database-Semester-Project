<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Live Music Database</title>
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

				<!-- Header -->
					<header id="header" class="alt">

						<span class="logo"><img src="images/logo.svg" alt="" /></span>
						<h1>Live Music Database</h1>
						<p>Just Another Totally Rad Concert Tracker<br />
						Built by Sarah Barkley, Ben Greenawald, Caroline Holmes, and Ryan Polsky</p>

						<?php
						if(isset($_REQUEST['msg'])){
							echo $_REQUEST['msg'];
							}
	  				?>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="query.php">Search Shows</a><li>
							<li><a href="delete_show.php">Delete Show</a><li>
							<li><a href="insert_show.php">Insert Show</a></li>
							<li><a href="update_show.php">Update Show</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
						<!--
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>Live Music Tracker</h2>
										</header>
										<p>This is our final project, we hope you like it Nada. Check out this circle!</p>
										<ul class="actions">
											<li><a href="query.php" class="button">Learn More</a></li>
										</ul>
									</div>
									<span class="image"><a href="export.php"><img src="images/horton-tom.jpg" alt="" /></a></span>
								</div>
							</section>
						-->
						<!-- First Section -->
							<section id="first" class="main special">
								<header class="major">
									<h2>Services</h2>
								</header>
								<ul class="features">
									<li>
										<span class="icon major style1 fa-music"></span>
										<h3>Browse Your Favorite Artists</h3>
										<p>See who's performing near you, and never miss out on a concert again</p>
									</li>
									<li>
										<span class="icon major style3 fa-ticket"></span>
										<h3>Find Your Tickets</h3>
										<p>See how many tickets are left for the show that you want</p>
									</li>
									<li>
										<span class="icon major style5 fa-gear"></span>
										<h3>Manage</h3>
										<p>Tour managers can keep track of their tours, update old shows or add brand new ones</p>
									</li>
								</ul>
								<footer class="major">
									<ul class="actions">
										<li><a href="query.php" class="button">Search Now</a></li>
										<li><a href="export.php" class="button">Export Data</a><li>
									</ul>
								</footer>
							</section>

						<!-- Second Section -->
							<!--<section id="second" class="main special">
								<header class="major">
									<h2>Not Sure What This Would Be</h2>
									<p>Donec imperdiet consequat consequat. Suspendisse feugiat congue<br />
									posuere. Nulla massa urna, fermentum eget quam aliquet.</p>
								</header>



								
								<ul class="statistics">
									<li class="style1">
										<span class="icon fa-map-o"></span>
										<hr>
										The Jefferson
										<hr>
										Sprint Pavillion
									</li>
									<li class="style2">
										<span class="icon fa-music"></span>
										<hr>
										The Chainsmokers
										<hr>									
										The Beatles
									</li>
									<li class="style3">
										<span class="icon fa-ticket"></span>
										<hr>
										Available
										<hr>
										Sold Out								
									</li>
									<li class="style4">
										<span class="icon fa-clock-o"></span>
										<hr>
										7:00 PM
										<hr>
										7:00 PM
									</li>
									<li class="style5">
										<span class="icon fa-dollar"></span>
										<hr>
										$40
										<hr>
										$60
									</li>
								</ul>
								<p class="content">Nam elementum nisl et mi a commodo porttitor. Morbi sit amet nisl eu arcu faucibus hendrerit vel a risus. Nam a orci mi, elementum ac arcu sit amet, fermentum pellentesque et purus. Integer maximus varius lorem, sed convallis diam accumsan sed. Etiam porttitor placerat sapien, sed eleifend a enim pulvinar faucibus semper quis ut arcu. Ut non nisl a mollis est efficitur vestibulum. Integer eget purus nec nulla mattis et accumsan ut magna libero. Morbi auctor iaculis porttitor. Sed ut magna ac risus et hendrerit scelerisque. Praesent eleifend lacus in lectus aliquam porta. Cras eu ornare dui curabitur lacinia.</p>
								<footer class="major">
									<ul class="actions">
										<li><a href="generic.html" class="button">Learn More</a></li>
									</ul>
								</footer>
							</section>-->

						<!-- Get Started -->
							<section id="cta" class="main special">
								<header class="major">
									<h2>Log In</h2>
								</header>
								<footer class="major">
									<ul class="actions">
                    							<li><a href="sign_in.php" class="button special">Log In</a></li>
    											<li><a href="sign_out.php" class="button special">Log Out</a></li>
                    					</ul>
								</footer>
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