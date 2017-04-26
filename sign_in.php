<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Sign In</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper" style="padding-bottom: 150px">

				<!-- Header -->
					<header id="header">
						<h1>Sign In</h1>
						<p>Enter Your Username and Password</p>
						<?php
						if(isset($_REQUEST['msg'])){
							echo $_REQUEST['msg'];
						}

					?>
					</header>

				<!-- Main -->
					<div id="main" >

            <!-- Sign In Form-->
            <section style="padding: 20px;height: 300px">
              <h2>Sign In</h2>
              <form method="post" action="signed_in.php">
                <div class="row uniform">
                  <div class="6u 12u$(xsmall)">
                    <input type="text" name="username" id="username" value="" placeholder="Username" />
                  </div>
								
                  <div class="6u$ 12u$(xsmall)">
                    <input type="password" name="password" id="password" value="" placeholder="Password" />
                  </div>

										<br>
										<br>

                </div>
                <div class="12u$">
  								<ul class="actions">
  									<li><input type="submit" value="Log In" class="special" /></li>
  									<li><input type="reset" value=Clear /></li>
  								</ul>
  							</div>
              </form>
            </section>
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
