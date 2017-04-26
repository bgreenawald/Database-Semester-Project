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

$sql1 = $con->prepare("SELECT * FROM performer NATURAL JOIN play NATURAL JOIN shows NATURAL JOIN venue NATURAL JOIN is_in NATURAL JOIN location WHERE performer.performer_name LIKE ?");

$sql1->bind_param("s", $q);
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

if(isset($results)){
  echo "<table>
  <tr>
  <th>Performer Name</th>
  <th>Genre</th>
  <th>Venue Name</th>
  <th>Date</th>
  <th>Start Time</th>
  <th>Percent Tickets</th>
  </tr>";
  foreach($results as $row) {
      $sql2 = "CALL GET_PERCENT_TICKETS_SOLD('$row[date_played]', '$row[doors_open]', '$row[venue_name]', @p3)";
      $result2 = mysqli_query($con, $sql2);

      mysqli_close($con);
      $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

      if($result2 != NULL){
        $res = mysqli_fetch_array($result2);
        $percent_tickets = $res['percent_tickets']*100;
      }else{
        $percent_tickets = "None found";
      }

      if($percent_tickets > 50){
        $isLow = "Tickets Low";
      }else if($percent_tickets == 100){
        $isLow = "Sold Out";
      }else{
        $isLow = "Tickets Available";
      }


      echo "<tr>";
      echo "<td>" . $row['performer_name'] . "</td>";
      echo "<td>" . $row['genre'] . "</td>";
      echo "<td>" . $row['venue_name'] . "</td>";
      echo "<td>" . $row['date_played'] . "</td>";
      echo "<td>" . $row['doors_open'] . "</td>";
      echo "<td>" . $isLow . "</td>";
      echo "</tr>";
  }
  echo "</table>";
}
mysqli_close($con);
?>





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


</body>
</html>