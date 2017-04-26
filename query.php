<?php
session_start();
if (!isset($_SESSION["username"]) || !isset($_SESSION["password"])) {
	header("Location: sign_in.php");
	die();
}

$SERVER = 'stardock.cs.virginia.edu';
$DATABASE = 'cs4750s17bhg5yd';
$USERNAME = $_SESSION["username"];
$PASSWORD = $_SESSION["password"];


$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (mysqli_connect_errno())
  {
  $error = "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else {
    
  }

 ?>

<!DOCTYPE HTML>

<html>
<head>

  <title>Search Shows</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="myStyle.css" />
  <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
  <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","get_query.php?q="+str,true);
        xmlhttp.send();
    }
}

function showBand(str) {
    if (str == "") {
        document.getElementById("txtHint2").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","get_band.php?q="+str,true);
        xmlhttp.send();
    }
}

function showTour(str) {
    if (str == "") {
        document.getElementById("txtHint3").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint3").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","get_tour_manager.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>

  <!-- Wrapper -->
  <div id="wrapper">

    <!-- Header -->
    <header id="header">
      <h1>Search the Music Database</h1>
    </header>
      <nav id="nav">
      <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="query.php">Search Shows</a><li>
              <li><a href="delete_show.php">Delete Show</a><li>
              <li><a href="insert_show.php">Insert Show</a></li>
              <li><a href="update_show.php">Update Show</a></li>
              
            </ul>
            </nav>
    <!-- Main -->
    <div id="main">

      <!-- Content -->
      <section id="content" class="main">

      <center>Search for Shows by ZIP Code</center>
      <form>
          <input type="text" onkeyup="showUser(this.value)">
      </form>
      <div id="txtHint"><b></b></div>
      <br>
      <center>Search for Shows by Band</center>
      <form>
          <input type="text" onkeyup="showBand(this.value)">
      </form>
      <div id="txtHint2"><b></b></div>
      <br>
      <center>Search for Tours By Manager</center>
      <form>
          <input type="text" onkeyup="showTour(this.value)">
      </form>
      <div id="txtHint3"><b></b></div>


      </section>

    </div>

    <!-- Footer -->
    <footer id="footer">
      
      <p class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
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