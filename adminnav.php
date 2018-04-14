<?php
session_start();


if($_SESSION['role'] == 'user'){

	header("location: home.php?alert=1");
}

elseif((isset($_SESSION['role']) == '') || isset($_SESSION['role']) != 'admin'){
  
  header("location: ezprinter.php?alert=5");
}


?>

<?php
$username = $_SESSION['username'];
$sqlgetname = "SELECT * FROM userinfo WHERE username = '$username'";
$result = mysqli_query($con, $sqlgetname);
$sqlgetrole = "SELECT * FROM login WHERE username = '$username'";
$resultrow = mysqli_query($con, $sqlgetrole);

$row = mysqli_fetch_assoc($result);
$getrow = mysqli_Fetch_assoc($resultrow);
?>
<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="admin.php">
				EZPrinter
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">			
			
			<ul class="nav navbar-nav navbar-right">
				<li><a>Welcome <?php echo $row['firstname'] . ' ' . $row['lastname']; echo ' | ' . $getrow['role'];?></a></li>
				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
		<div class="col-md-2 sidebar">
			<ul class="nav nav-pills nav-stacked text-center">
				<li><a href="admin.php">Home</a></li>
				<li><a href="addadmin.php">Add Admin</a></li>
				<li><a href="adminadd.php">Add Product</a></li>
				<li><a href="admine.php">Update/Delete Product</a></li>
				<li><a href="adminproduct.php">Update Product Order</a></li>
				<li><hr class="half-rule"></li>
				<li><a href="complaintsadmin.php">My Tickets</a></li>
				<li><a href="unhandledcomplaints.php">Unassigned Tickets</a></li>
				<li><a href="completedtickets.php">Completed Tickets</a></li>
				<li><hr class="half-rule"></li>
				<li><a href="reportsforadmin.php">Reports</a></li>
				<li><hr class="half-rule"></li>
			</ul>
		</div>