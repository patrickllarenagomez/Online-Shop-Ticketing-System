<?php
ob_start();

include 'connect.php';

$id = $_GET['id'];

$closeSQL = "UPDATE forum SET status = 'CLOSED' WHERE forumID = '$id'";
mysqli_query($con, $closeSQL);
mysqli_close($con);
header("location: unhandledcomplaints.php?alert=1");
?>
