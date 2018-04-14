<?php
ob_start();
session_start();
include 'connect.php';

$id = $_GET['id'];

$removeitemSQL = "DELETE FROM cart WHERE cartID = '$id'";

mysqli_query($con, $removeitemSQL);
mysqli_close($con);
header("location: usercart.php");

?>