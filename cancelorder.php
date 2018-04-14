<?php
ob_start();
session_start();
include 'connect.php';

$id = $_GET['id'];

$removeitemSQL = "DELETE FROM productorder WHERE orderID = '$id'";

mysqli_query($con, $removeitemSQL);
mysqli_close($con);
header("location: userorder.php");

?>