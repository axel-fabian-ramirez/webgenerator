<?php

session_start();

    $HOST="localhost";
  $USERNAME="adm_webgenerator";
  $PASSWORD="webgenerator2020";
    $NOMBREDB="webgenerator";

  

$conn = mysqli_connect($HOST, $USERNAME, $PASSWORD,$NOMBREDB);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($conn) {
  echo "";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




?>

    
