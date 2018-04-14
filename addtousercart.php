<?php
ob_start();
include 'connect.php';
session_start();


if(empty($_SESSION['username'])){
	header("location:shop.php?alert=1");
}else{

$username = $_SESSION['username'];
$itemNo = $_GET['id'];

$getitempriceSQL = "SELECT * FROM items WHERE itemNo = '$itemNo'";
$result = mysqli_query($con, $getitempriceSQL);
$row = mysqli_fetch_assoc($result);

$itemPrice = $row['itemPrice'];

$addtocartSQL = "INSERT INTO cart (username, itemNo, itemCartQuantity, totalPrice) VALUES ('$username', '$itemNo', '1','$itemPrice')";

mysqli_query($con, $addtocartSQL);

mysqli_close($con); 
header("location:shop.php?alert=2");
}
?>