<?php
session_start();

//redirect if not logged in
if (!isset($_SESSION["username"]) || !isset($_SESSION["password"])) {
	header("Location: sign_in.php");
	die();
}

$SERVER = 'stardock.cs.virginia.edu';
$DATABASE = 'cs4750s17bhg5yd';
$USERNAME = $_SESSION["username"];
$PASSWORD = $_SESSION["password"];



$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

$performer_name = isset($_POST["artist-name"]) ? mysqli_real_escape_string($con, $_POST["artist-name"]) : "";
$venue_name = isset($_POST["venue-name"]) ? mysqli_real_escape_string($con, $_POST["venue-name"]) : "";
$tour_name = isset($_POST["tour-name"]) ? mysqli_real_escape_string($con, $_POST["tour-name"]) : NULL;
$date = isset($_POST["date"]) ? mysqli_real_escape_string($con, $_POST["date"]) : "";
$time = isset($_POST["time"]) ? mysqli_real_escape_string($con, $_POST["time"]) : "";

?>

<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Add Show</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body >


<!-- Wrapper -->
			<div id="wrapper" style="padding-bottom: 150px">

				<!-- Header -->
					<header id="header">
						<center>
					        <ul class="actions">
					          <li><a href="index.php" class="button">Home</a></li>
					          <li><a href="insert_show.php" class="button">Back To Insert</a></li>
					        </ul>
					        </center>
					</header>

				<!-- Main -->
					<div id="main" >

            <!-- Sign In Form-->
            <section style="padding: 20px;height: 300px">
              <center>
						<?php
							$sql1 = $con->prepare("INSERT INTO shows VALUES(?, ?, ?)");
							if($sql1){
								$sql1->bind_param("sss", $date, $time, $venue_name);
								$query1 = $sql1->execute();
								
								$sql2 = $con->prepare("INSERT INTO play VALUES(?, ?, ?, ?)");
								$sql2->bind_param("ssss", $performer_name, $date, $time, $venue_name);
								$query2 = $sql2->execute();

								if ($query1 == TRUE && $query2 == TRUE) {
	  								echo "New show successfully added <br>";
								} else if($query1 == TRUE && $query2 == FALSE){
									$sql2_1 = $con->prepare("DELETE FROM shows WHERE date_played = ? AND doors_open = ? AND venue_name = ?");
									$sql2_1->bind_param("sss", $date, $time, $venue_name);
									$sql2_1->execute();
									echo "Could not find the given artist" . "<br>";
								}else {
									echo "Could not add show" . "<br>"; 
								}

								if(isset($tour_name) && $tour_name != ""){
									$sql3 = $con->prepare("INSERT INTO contain VALUES(?, ?, ?, ?)");
									$sql3->bind_param("ssss", $tour_name, $date, $time, $venue_name);
									$query3 = $sql3->execute();
									if($query3 == TRUE){
										echo "Show added to tour." . "<br>";
									}else{
										echo "Tour name not found or tour date out of range." . "<br>";
									}
								}
							}else{
								echo "Do not have proper credentials for insert";
							}

							mysqli_close($con);


						?>
						</center>
            			</section>
					</div>
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
