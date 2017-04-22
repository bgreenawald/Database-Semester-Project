<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = $_GET['q'];

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


$sql="SELECT * FROM performer NATURAL JOIN go_on NATURAL JOIN tour WHERE tour_manager_first_name LIKE '%$q%' OR tour_manager_last_name LIKE '%$q%'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Manager Name</th>
<th>Tour Name</th>
<th>Start Date</th>
<th>End Date</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['tour_manager_first_name'] . " " . $row['tour_manager_last_name'] . "</td>";
    echo "<td>" . $row['performer_name'] . "</td>";
    echo "<td>" . $row['date_started'] . "</td>";
    echo "<td>" . $row['date_ended'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>