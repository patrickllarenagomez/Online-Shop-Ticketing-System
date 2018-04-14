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
	<title>Admin</title>

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
                	<h3> Update Product Delivery </h3>
                	<form action="#" method="post">
                		<div class="input-group">
                		<input class="form-control" type="text" name="searchText" placeholder="Search Product ID or Name">
                		<span class="input-group-addon">
                			<i class="glyphicon glyphicon-search"></i>
                		</span>
                		</div>
                		<input type="submit" class="hidethis" name="submitsearch">
                	</form>

 
<?php

        if(isset($_POST['submitsearch']) && !empty($_POST['searchText'])){

         $searchText = $_POST['searchText'];

         if(is_numeric($searchText)){
            $searchQuery = "SELECT * FROM productorder WHERE orderID = '$searchText'";
             $result = mysqli_query($con, $searchQuery);
         }
            $result = mysqli_query($con, $searchQuery);
         

       
        
       
?>
    <table class="table table-hover">
    <tr>
    <th>Order No</th>   
    <th>Buyer</th>
    <th>Product Delivered?</th>
    </tr>
<?php 

   while($row = mysqli_fetch_assoc($result)){
        $username =$row['username'];
       
       $sqlproductupdate = "SELECT * FROM userinfo WHERE username = '$username'"; 
       $res = mysqli_query($con, $sqlproductupdate);

       while($rowname = mysqli_fetch_assoc($res)){
        echo '<tr>';
        echo '<td>' . $row['orderID'] . '</td>';
        echo '<td>' . $rowname['lastname']. ', '. $rowname['firstname'] . '</td>';
        echo '<td><a href="adminproductedit.php?var='.$row['orderID'].'">' .'Update'. '</a></td>';

        echo '</tr>';
    }
    
echo '</table>';
    if(isset($_POST['submitsearch'])){
        if(!$result){
            if(empty(mysqli_num_rows($result))){
                echo 'No results found.';
            }
        }
    }
  }
}
    


echo '</div>';
echo '</div>';
echo '</div>';

?>
    <!-- FOOTER -->
        <footer class="pull-left footer">
            <p class="col-md-12">
                <hr class="divider">
                Copyright &COPY; 2017 <a href="http://ez-printer.000webhostapp.com">EZPrinter</a>
            </p>
        </footer>

<?php
        if(isset($_GET['alert'])){
$getalert = $_GET['alert'];

if($getalert == '1'){
    echo '<script>';
    echo 'alert("Update Sucessful.")';
    echo '</script>';
    }
}

?>


</body>
</html>
