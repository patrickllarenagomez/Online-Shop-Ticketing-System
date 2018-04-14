<?php

$conUser = "id1084993_ezprinter";
$conPass = "OU31LP3K2YY";
$conDbName = "id1084993_onlineshopdb";
$con = mysqli_connect("localhost", "$conUser", "$conPass", "$conDbName");

if(mysqli_connect_errno()){

  echo "Failed to connect to MySQL" . mysqli_connect_errno();
}


?>