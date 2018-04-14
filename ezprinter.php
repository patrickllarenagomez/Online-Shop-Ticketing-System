<?php
ob_start();

?>

<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="stylesheet.css" rel="stylesheet">	
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="jquery-3.1.1.min.js"></script>
 	<script src="js/bootstrap.min.js"></script>
 	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">	
 	<link href="devices.css">

	<title>EZ Printer</title>
</head>
<body>

<!-- NAVBAR -->
 <?php
include 'navbar.php';
    ?>

<!-- CAROUSEL -->

    <div id="myCarousel" class="carousel slide cpntainer-fluid" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <a href="shop.php"><img src="res/pic1.png" ></a>
    </div>

    <div class="item">
      <a href="about.php"><img src="res/pic2.png"></a>
    </div>

    <div class="item">
      <a href="contact-us.php"><img src="res/pic3.jpg"></a>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- PRODUCT SECTION -->

<div>
	<div class="container">
		<h2 class="front">Check out our affordable prices!</h2>
		<hr class="half-rule">

		<div class="row">
			<div class="col-sm-3">
				<img src="resources/printer1.jpg" class="img-responsive center-block">
				<h3>CANON Pixma MG5320</h3>
				<p class="price">PHP 4,999.00</p>
			</div>
			<div class="col-sm-3">
				<img src="resources/printer2.jpg" class="img-responsive center-block">
				<h3>HP M128FN</h3>
				<p class="price">PHP 3,999.00</p>
			</div>

			<div class="col-sm-3">
				<img src="resources/printer3.jpg" class="img-responsive center-block">
				<h3>CANON Pixma G3000</h3>
				<p class="price">PHP 2,500.00</p>
			</div>

			<div class="col-sm-3">
				<img src="resources/printer4.jpg" class="img-responsive center-block">
				<h3>HP DesignJet T795</h3>
				<p class="price">PHP 7,499.00</p>
			</div>
		</div>
	</div>
</div>


<!--  FLAT DESIGNS SECTION  -->
<div>
	<div class="container">
		<hr class="half-rule">

		<div class="row">
			<div class="col-sm-4">
				<img src="res/flat1.png" class="img-responsive center-block">
				<h3>SHOP.</h3>
				<p>Buy items and put them in order forms. We'll be taking the process here on.</p>
			</div>
			<div class="col-sm-4">
				<img src="res/flat2.png" class="img-responsive center-block">
				<h3>PAY.</h3>
				<p>Pay using your credit card or do payment through delivery.</p>
			</div>
			<div class="col-sm-4">
				<img src="res/flat3.png" class="img-responsive center-block">
				<h3>DELIVERED.</h3>
				<p>Item Successfully Delivered! Nationwide or International. Free Shipping fee locally.</p>
			</div>
		</div>
	</div>
</div>
<hr class="half-rule">

<?php
include 'connect.php';
include 'login.php';
include 'footer.php';

 ?>


 <?php

 if(isset($_GET['alert'])){

 	$alert = $_GET['alert'];	
 	if($alert == '2'){
 		echo '<script>';
 		echo 'alert("Registration Successful.")';
 		echo '</script>';
 	}
 	elseif($alert == '3'){
 		echo '<script>';
 		echo 'alert("Email registered!")';
 		echo '</script>';
 	}
 	elseif($alert == '4'){
 		echo '<script>';
 		echo 'alert("Please login first to access the page.")';
 		echo '</script>';
 	}
 	elseif($alert == '5'){
 		echo '<script>';
 		echo 'alert("Your account does not qualify to view this page. Please login your account.")';
 		echo '</script>';
 	}
 }

 ?>



</body>
</html>