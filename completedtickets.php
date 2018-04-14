<?php
ob_start();

include 'connect.php';

?>



<!DOCTYPE html>
<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
   
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<title>My Tickets</title>
</head>
<body>

<?php

include 'adminnav.php';

?>

<?php

	$username = $_SESSION['username'];
	$getname = "SELECT * FROM userinfo WHERE username ='$username'";
	$result = mysqli_query($con, $getname);
	$row = mysqli_fetch_assoc($result);
?>

<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>
                <div class="panel-body">
                	<h2 class="text-center"> Welcome <?php echo $row['firstname'];?>! </h2>
                		<p class="text-center"> We've added admin features for the e-commerce site. </p>
                </div>
                <div class="table-responsive">
				  <h2>&nbsp; Completed Tickets</h2>        
  			<table class="table table-hover">
		    <thead>

		      <tr>
		        <th>Ticket ID</th>
		        <th>Title</th>
		        <th>Category</th>
		        <th>Last Reply</th>
		        <th>Status</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php 

		    	$getdatafromforum = "SELECT * FROM forum WHERE status = 'CLOSED'";
		    	$getdatafromforumresult = mysqli_query($con, $getdatafromforum);
		    ?>
		    <?php

		    	while($getdatafromforumresultrow = mysqli_fetch_assoc($getdatafromforumresult)){
		    				$fID = $getdatafromforumresultrow['forumID'];
		    				$getlastreplysSQL = "SELECT * FROM discussion WHERE forumID = '$fID' AND dateandtime = (SELECT MAX(dateandtime) FROM discussion WHERE forumID = '$fID')";
		    				$getlastreplysSQLresult = mysqli_query($con, $getlastreplysSQL);

		    			while($getlastreplysSQLresultrow = mysqli_fetch_assoc($getlastreplysSQLresult)){

		    ?>

		      <tr>
		        <td><?php echo $getdatafromforumresultrow['forumID']?> </td>
		        <td><?php echo $getdatafromforumresultrow['title']?></td>
		        <td><?php echo $getdatafromforumresultrow['category']?></td>
		        <td><?php echo $getlastreplysSQLresultrow['nameUser']?></td>
		        <td><?php echo $getdatafromforumresultrow['status']?></td>
		        

		      </tr>
		      <?php }} ?>
		    </tbody>
		  </table>
		</div>
	</div>
</div>

</body>
</html>