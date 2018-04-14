<?php

include 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="stylesheetadmin.css" rel="stylesheet">	
	<script src="js/bootstrap.js" type="text/javascript"></script>
	   <script src="jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<title>Admin</title>
</head>
<body>
<?php

include 'adminnav.php';
$username = $_SESSION['username'];
$sqlgetname = "SELECT * FROM userinfo WHERE username = '$username'";
$result = mysqli_query($con, $sqlgetname);
$row = mysqli_fetch_assoc($result);
?>
		<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>
                <div class="panel-body">
                	<h3> Welcome <?php echo $row['firstname'] . ' ' . $row['lastname'];?>! </h3>
                		<p> We've added new features for the e-commerce site. </p>
                	<ul>
                		<li>Adding Products</li>
                		<li>Deleting Products</li>
                		<li>Editing Products</li>
                		<li>Updating Product Order</li>
                	</ul>
                	<p> We've also added ticketing systems </p>
                	<ul>
                		<li>Replying to tickets</li>
                		<li>Assigning tickets</li>
                	</ul>
                </div>
            </div>
		</div>
		<!-- FOOTER -->
		<footer class="pull-left footer">
			<p class="col-md-12">
				<hr class="divider">
				Copyright &COPY; 2017 <a href="http://ez-printers.000webhostapp.com">EZPrinters</a>
			</p>
		</footer>


<?php


 if(isset($_GET['alert'])){
 	$alert = $_GET['alert'];	
 	if($alert == '1'){
 		echo '<script>';
 		echo 'alert("You are not allowed to access this page.")';
 		echo '</script>';
 	}
 	if($alert == '2'){
 		echo '<script>';
 		echo 'alert("Ticket Assignment Updated.")';
 		echo '</script>';
 	}
 }

 

?>


</body>
</html>