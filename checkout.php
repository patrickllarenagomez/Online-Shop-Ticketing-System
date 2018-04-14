<?php
ob_start();
session_start();
include 'connect.php';
?>
<?php 
echo "<script>
function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)==1) {
        location.href = 'userorder.php';
    }
    i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);
</script>";
?>
<!DOCTYPE html>
<html>
<head>	

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="stylesheet.css" rel="stylesheet">	
	<script src="js/bootstrap.js" type="text/javascript"></script>
 	<script src="js/bootstrap.min.js"></script>
    <script src="js/jqueryshop.js"></script>
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<title>Checkout</title>
</head>
<body>


<?php

include 'usernavbar.php';

?>
<br>
<div class="container col-md-12 text-center">
<h2>Purchase Successful! </h2>

<div>
<p>Redirecting you to your orders in <span id="counter">3</span>...</p>
</div>
</div>



</body>
</html>