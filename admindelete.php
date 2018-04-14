<?php
include 'connect.php';


$itemNo = $_GET['var'];
$getNameSQL = "SELECT * FROM items WHERE itemNo = '$itemNo'";
$result = mysqli_query($con, $getNameSQL);
$row=mysqli_fetch_assoc($result);
$imagefile=$row['itemImage'];
echo $imagefile;
unlink($imagefile);
$deleteSQL = "DELETE FROM items WHERE itemNo = '$itemNo'";
mysqli_query($con, $deleteSQL);
header("location: admine.php");
?>
