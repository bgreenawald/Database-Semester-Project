<?php
session_start();
$SERVER = 'stardock.cs.virginia.edu';
$DATABASE = 'cs4750s17bhg5yd';
$USERNAME = $_SESSION["username"];
$PASSWORD = $_SESSION["password"];

if (!isset($USERNAME) || !isset($PASSWORD)) {
	header("Location: sign_in.html");
	die();
}

$conn = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

$venue_name = isset($_POST["venue-name"]) ? mysqli_real_escape_string($conn, $_POST["venue-name"]) : "";
$date = isset($_POST["date"]) ? mysqli_real_escape_string($conn, $_POST["date"]) : "";
$time = isset($_POST["time"]) ? mysqli_real_escape_string($conn, $_POST["time"]) : "";
$time_new = isset($_POST["time_new"]) ? mysqli_real_escape_string($conn, $_POST["time_new"]) : "";

?>

<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Update Show</title>
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
		          <li><a href="index.php" class="button">Home</a></li>
		          <li><a href="update_show.php" class="button">Back To Update</a></li>
		        </ul>

				<!-- Main -->
					<div id="main">
						<?php
							

							$sql2 = $conn->prepare("SELECT venue_name FROM shows WHERE date_played = ? AND doors_open = ? AND venue_name = ?");
							$sql2->bind_param("sss", $date, $time, $venue_name);
							$sql2->execute();
							$sql2->bind_result($res);
							if($sql2->fetch() == NULL){
								echo "The given show could not be found";
								$sql2->close();
							}
							else{
								$sql2->close();
								$sql1 = $conn->prepare("UPDATE shows SET doors_open = ? WHERE date_played = ? AND doors_open = ? AND venue_name = ?");
								if($sql1){
									$sql1->bind_param("ssss", $time_new, $date, $time, $venue_name);
									$query1 = $sql1->execute();
									if ($query1 == TRUE) {
		  								echo "The show was successfully updated";
									}else {
									    echo "Problem updating the show";
									}
								}else{
									echo "Do not have credentials to update";
								}

							}
							mysqli_close($conn);


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
