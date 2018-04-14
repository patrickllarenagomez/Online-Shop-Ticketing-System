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

$numberofopen = "SELECT * FROM forum WHERE status = 'OPEN'";
$result = mysqli_query($con, $numberofopen);
$rowresult = mysqli_num_rows($result);


$selectnumberofunassigned = "SELECT * FROM forum WHERE assignedTo = ''";
$resultsql = mysqli_query($con, $selectnumberofunassigned);
if($resultsql == false){
	$rowresultsql = 0;
}else{
	$rowresultsql = mysqli_num_rows($resultsql);
}

$selectcomplete = "SELECT * FROM forum WHERE status = 'CLOSED'";
$rowcomplete = mysqli_query($con, $selectcomplete);
if($rowcomplete == false){
	$rowresultcompleted = 0;
}else{
	$rowresultcompleted = mysqli_num_rows($rowcomplete);
}


$selectproduct = "SELECT * FROM productOrder WHERE isDelivered = 'DELIVERED'";
$selectproductresult = mysqli_query($con, $selectproduct);

if($selectproductresult == false){
	$rowproduct = 0;
}else{

$rowproduct = mysqli_num_rows($selectproductresult);
}

$selectproduct1 = "SELECT * FROM productOrder WHERE isDelivered = 'NOT YET'";
$selectproductresult1 = mysqli_query($con, $selectproduct1);

if($selectproductresult1 == false){
	$rowproduct1 = 0;
}else{

$rowproduct1 = mysqli_num_rows($selectproductresult1);
}

?>


<?php

	include 'adminnav.php';

?>

<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>
                <div class="panel-body">
                	<h3> Welcome <?php echo $row['firstname'] . ' ' . $row['lastname'];?>! </h3>
                		<p>Here are product reports:</p>
                		<label>Number of Delivered Orders: <?php echo $rowproduct?></label><br>
                		<label>Number of Undelivered Orders: <?php echo $rowproduct1?></label>
                		<hr class="half-rule">
                		<p>Here are the ticket reports: </p>
                		<label>Number of Open Tickets:<?php echo $rowresult; ?></label><br>
                		<label>Number of Unassigned Tickets:<?php echo $rowresultsql;?></label><br>
                		<label>Number of Completed Tickets:<?php echo $rowresultcompleted; ?></label><br>
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


	</body>
</html>