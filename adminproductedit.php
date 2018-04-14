<?php 

include 'connect.php';

$id = $_GET['var'];


$sqldeliver = "UPDATE productorder SET isDelivered = 'DELIVERED' WHERE orderID = '$id'";
mysqli_query($con, $sqldeliver);


header("location: adminproduct.php?alert=1");

?>
