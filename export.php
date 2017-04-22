<?php
session_start();
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


$tables = array('contain', 'go_on', 'is_in', 'location', 'performer', 'play', 'sells', 'shows', 'tickets', 'tour', 'venue');

foreach($tables as $name){
	echo "Dumping date for table ", $name, PHP_EOL;

	$sql = "select * from $name";
	$result = mysqli_query($con, $sql) or die("Error in Selecting " . mysqli_error($con));

	//create an array
	$emparray = array();
	while($row =mysqli_fetch_assoc($result))
	{
	    $emparray[] = $row;
	}


echo json_encode($emparray);
echo PHP_EOL;
}


$filename='empdata.json';


header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Length: ". filesize("$filename").";");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/octet-stream; "); 
header("Content-Transfer-Encoding: binary");

#echo json_encode($emparray);

mysqli_close($con);

?>