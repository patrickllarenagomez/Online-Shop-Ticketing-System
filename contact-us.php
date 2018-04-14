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
	<title>EZ Printer</title>
</head>
<body>
    
 
 <?php
 include 'navbar.php';

 ?>


<!-- Contact Section -->

  <div class="container">
  <br>
  <h2 class="text-left">Contact Us</h2>
  <hr class="half-rule">
<div class="container">
  <p class="text-left">222 MegaFocus ST Mandaluyong City</p>
  <p class="text-left">Mobile Number: 09174772956</p>
  <p class="text-left">Email us at: ezprintershop@gmail.com</p>
</div>
<form action="" method="get">
    <div class="form-group">
      <label for="comment">Send Message:</label>
      <textarea class="form-control" rows="5" id="comment" name="txtArea"></textarea>
     <div class="container-fluid">
      <input class="pull-right" type="submit" value="Submit" name="submit">
    </div>
    </div>
  </form>
</div>

<?php

if(isset($_GET['submit'])){
$to      = 'ezprintershop@gmail.com';
$subject = 'Message from Website';
$message = 'htmlspecialchars($_GET["txtArea"])';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

}
?> 

<?php

include 'footer.php';
include 'connect.php';
include 'login.php';
?>
</body>
</html>