
<?php

  session_start();
	$USERNAME = $_SESSION["username"];
	$PASSWORD = $_SESSION["password"];

  if (isset($USERNAME) && isset($PASSWORD)){
		$USERNAME = $_SESSION["username"];
		$PASSWORD = $_SESSION["password"];
	}
  else{
		$USERNAME = "";
		$PASSWORD = "";
	}
	$SERVER = 'stardock.cs.virginia.edu';
	$DATABASE = 'cs4750s17bhg5yd';
?>
