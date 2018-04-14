<?php
ob_start();
session_start();

include 'connect.php';

?>

<!DOCTYPE html>
<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="stylesheet.css" rel="stylesheet">
	<title>My Complaints</title>
</head>
<body>

<?php

include 'usernavbar.php';

?>

<?php

	$username = $_SESSION['username'];
	$getname = "SELECT * FROM userinfo WHERE username ='$username'";
	$result = mysqli_query($con, $getname);
	$row = mysqli_fetch_assoc($result);
?>


<div class="col-md-12 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>
                <div class="panel-body">
                	<h2 class="text-center"> Welcome <?php echo $row['firstname'];?>! </h2>
                		<p> We've added new features for the e-commerce site. </p>
                </div>
                <div class="table-responsive container">
				  <h2>Filed Complaints</h2>        
  			<table class="table table-hover">
		    <thead>

		      <tr>
		        <th>Ticket ID</th>
		        <th>Title</th>
		        <th>Category</th>
		        <th>Last Reply</th>
		        <th>Admin</th>
		        <th>Status</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php 

		    	$getdatafromforum = "SELECT * FROM forum WHERE username = '$username'";
		    	$getdatafromforumresult = mysqli_query($con, $getdatafromforum);
		    ?>
		    <?php

		    	while($getdatafromforumresultrow = mysqli_fetch_assoc($getdatafromforumresult)){

		    				$nameofassigned = $getdatafromforumresultrow['assignedTo'];
		    				$sqltogetassignedname = "SELECT * FROM userinfo WHERE username ='$nameofassigned'";
		    				$resultingrow = mysqli_query($con, $sqltogetassignedname);

		    				$getname = mysqli_fetch_assoc($resultingrow);


		    				
		    				$fID = $getdatafromforumresultrow['forumID'];
		    				$getlastreplysSQL = "SELECT * FROM discussion WHERE forumID = '$fID' AND dateandtime = (SELECT MAX(dateandtime) FROM discussion WHERE forumID = '$fID')";
		    				$getlastreplysSQLresult = mysqli_query($con, $getlastreplysSQL);

		    			while($getlastreplysSQLresultrow = mysqli_fetch_assoc($getlastreplysSQLresult)){

		    ?>

		      <tr>
		        <td><?php echo $getdatafromforumresultrow['forumID']?> </td>
		        <td><?php echo $getdatafromforumresultrow['title']?></td>
		        <td><?php echo $getdatafromforumresultrow['category']?></td>
		        <?php if($getlastreplysSQLresultrow['nameUser'] == ''){

			       ?>
			       <td><?php echo $getlastreplysSQLresultrow['nameAdmin']?></td>
		        
		        <?php }else{ ?>

		        <td><?php echo $getlastreplysSQLresultrow['nameUser']?></td>
		        	<?php } ?>
		        <td><?php echo $getname['firstname']. ' ' . $getname['lastname'];?></td>
		        <td><?php echo $getdatafromforumresultrow['status']?></td>
		        <?php if($getdatafromforumresultrow['status'] == 'CLOSED'){}else{?>

		        <td><a href="replytocomplaint.php?id=<?php echo $getdatafromforumresultrow['forumID']?>">Reply</a></td>
		        <?php } ?>
		      </tr>
		      <?php }} ?>
		    </tbody>
		  </table>
		</div>
	</div>
</div>


<table>

</body>
</html>