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
	<title></title>
</head>
<body>


<?php

	include 'adminnav.php';
?>
<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>
                <div class="panel-body">
                	
                <form action="" method="post">
                <div class="col-md-4">
	                <label>Username:<input class="form-control" type="text" name="username" required></label>
	                <label>Password:<input class="form-control" type="text" name="password" required></label>
	                <label>First Name:<input class="form-control" type="text" name="firstname" required></label>
	                <label>Last Name:<input class="form-control" type="text" name="lastname" required></label>
	                <label>Position:<input class="form-control" type="text" name="position" required></label>
	               	<div class="col-md-6 center-block">
	                <input class="form-control btn btn-success" type="submit" name="submit" value="submit" required>
					</div>
				</div>
				</form>
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

			if(isset($_POST['submit'])){

				$user = $_POST['username'];
				$pass = $_POST['password'];
				$role = $_POST['position'];

			$insertdata = "INSERT INTO login (username, password, role) VALUES ('$user', '$pass', '$role')";
			mysqli_query($con, $insertdata);

			$fname = $_POST['firstname'];
			$lname = $_POST['lastname'];
				
			echo mysqli_error($con);
			$insertdataontableuserinfo = "INSERT INTO userinfo (username, firstname, lastname, userImage) VALUES ('$user', '$fname', '$lname', 'res/admin.png')";
			mysqli_query($con, $insertdataontableuserinfo);
			header("location:addadmin.php?alert=1");
			mysqli_close($con);
			}

		?>

		<!-- SCRIPT --> 
		<?php

		if(isset($_GET['alert'])){

			$alert = $_GET['alert'];
			if($alert == '1'){
				echo "<script>";
				echo "alert('Account added.');";
				echo "</script>";
			}

		}
		?>

	</body>
</html>
