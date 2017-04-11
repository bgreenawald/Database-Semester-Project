<?php

include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
  echo "Succesful";
}

if ($result = $con->query("DELETE FROM Boats WHERE 1")) {
    echo "Success";

    /* free result set */
    $result->close();
}else{
  echo "Failure";
}


mysqli_close($con);
?>
