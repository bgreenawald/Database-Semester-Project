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

  <title>Elements - Stellar by HTML5 UP</title>
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
      <section>
        <h2>Aliquam sed mauris</h2>
        <p>Sed lorem ipsum dolor sit amet et nullam consequat feugiat consequat magna adipiscing tempus etiam dolore veroeros. eget dapibus mauris. Cras aliquet, nisl ut viverra sollicitudin, ligula erat egestas velit, vitae tincidunt odio.</p>
        <ul class="actions">
          <li><a href="#" class="button">Learn More</a></li>
        </ul>
      </section>
      <section>
        <h2>Etiam feugiat</h2>
        <dl class="alt">
          <dt>Address</dt>
          <dd>1234 Somewhere Road &bull; Nashville, TN 00000 &bull; USA</dd>
          <dt>Phone</dt>
          <dd>(000) 000-0000 x 0000</dd>
          <dt>Email</dt>
          <dd><a href="#">information@untitled.tld</a></dd>
        </dl>
        <ul class="icons">
          <li><a href="#" class="icon fa-twitter alt"><span class="label">Twitter</span></a></li>
          <li><a href="#" class="icon fa-facebook alt"><span class="label">Facebook</span></a></li>
          <li><a href="#" class="icon fa-instagram alt"><span class="label">Instagram</span></a></li>
          <li><a href="#" class="icon fa-github alt"><span class="label">GitHub</span></a></li>
          <li><a href="#" class="icon fa-dribbble alt"><span class="label">Dribbble</span></a></li>
        </ul>
      </section>
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