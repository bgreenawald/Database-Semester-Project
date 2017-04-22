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

$performer_name = isset($_POST["artist-name"]) ? mysqli_real_escape_string($conn, $_POST["artist-name"]) : "";
$venue_name = isset($_POST["venue-name"]) ? mysqli_real_escape_string($conn, $_POST["venue-name"]) : "";
$tour_name = isset($_POST["tour-name"]) ? mysqli_real_escape_string($conn, $_POST["tour-name"]) : NULL;
$date = isset($_POST["date"]) ? mysqli_real_escape_string($conn, $_POST["date"]) : "";
$time = isset($_POST["time"]) ? mysqli_real_escape_string($conn, $_POST["time"]) : "";

echo "tour name is " . $tour_name;
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
	<body>

		<!-- Wrapper -->
			<div id="wrapper">
		        <ul class="actions">
		          <li><a href="query.php" class="button special">Search the Database</a></li>
		          <li><a href="index.html" class="button">Home</a></li>
		        </ul>

				<!-- Main -->
					<div id="main">
						<?php
							$sql1 = "INSERT INTO shows VALUES('$date', '$time', '$venue_name')" ;
							$sql2 = "INSERT INTO play VALUES('$performer_name', '$date', '$time', '$venue_name')" ;
							$query1 = $conn->query($sql1);
							$query2 = $conn->query($sql2);
							if ($query1 == TRUE && $query2 == TRUE) {
  								echo "New show successfully added";
							} else if($query1 == TRUE && $query2 == FALSE){
								$conn->query("DELETE FROM shows WHERE date_played = '$date' AND doors_open = '$time' AND venue_name = '$venue_name'");
								echo "Error: " . $sql2 . "<br>" . $conn->error;
							}else {
							    echo "Error: " . $sql1 . "<br>" . $conn->error;
							    echo "Error: " . $sql2 . "<br>" . $conn->error;
							}

							if(isset($tour_name) && $tour_name != ""){
								$sql3 = "INSERT INTO contain VALUE('$tour_name', '$date', '$time', '$venue_name')";
								if($conn->query($sql3) == TRUE){
									echo "Show added to tour";
								}else{
									echo"Error: " . $sql3 . "<br>" . $conn->error;
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
