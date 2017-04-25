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

$q = mysqli_real_escape_string($con, $_GET['q']);
$q = "%{$q}%";
$p = $q;

$sql1 = $con->prepare("SELECT * FROM performer NATURAL JOIN go_on NATURAL JOIN tour WHERE tour_manager_first_name LIKE ? OR tour_manager_last_name LIKE ?");

$sql1->bind_param("ss", $q, $p);
$sql1->execute();

$meta = $sql1->result_metadata();

while ($field = $meta->fetch_field()) {
  $parameters[] = &$row[$field->name];
}

call_user_func_array(array($sql1, 'bind_result'), $parameters);

while ($sql1->fetch()) {
  foreach($row as $key => $val) {
    $x[$key] = $val;
  }
  $results[] = $x;
}

echo "<table>
<tr>
<th>Tour Name</th>
<th>Manager First Name</th>
<th>Manager Last Name</th>
<th>Date Started</th>
<th>Date Ended</th>
</tr>";
foreach($results as $row) {

    echo "<tr>";
    echo "<td>" . $row['tour_name'] . "</td>";
    echo "<td>" . $row['tour_manager_first_name'] . "</td>";
    echo "<td>" . $row['tour_manager_last_name'] . "</td>";
    echo "<td>" . $row['date_started'] . "</td>";
    echo "<td>" . $row['date_ended'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>