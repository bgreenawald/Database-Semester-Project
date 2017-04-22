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


$sql="SELECT * FROM performer NATURAL JOIN play NATURAL JOIN shows NATURAL JOIN venue NATURAL JOIN is_in NATURAL JOIN location NATURAL JOIN sells NATURAL JOIN tickets WHERE zip_code LIKE '%$q%'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Performer Name</th>
<th>Genre</th>
<th>Venue Name</th>
<th>Date</th>
<th>Start Time</th>
<th>Ticket Price</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['performer_name'] . "</td>";
    echo "<td>" . $row['genre'] . "</td>";
    echo "<td>" . $row['venue_name'] . "</td>";
    echo "<td>" . $row['date_played'] . "</td>";
    echo "<td>" . $row['doors_open'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>