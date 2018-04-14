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
                	<h3> Edit Product </h3>
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
            $searchQuery = "SELECT * FROM items WHERE itemNo = '$searchText'";
         } else{
            $searchQuery = "SELECT * FROM items WHERE itemName LIKE '%$searchText%'";
        }

        $result = mysqli_query($con, $searchQuery);
       
        
       
?>
    <table class="table table-hover">
    <tr>
    <th>Product No</th>
    <th>Product Name</th>
    <th>Action</th>
    </tr>
<?php 

   while($row = mysqli_fetch_assoc($result)){
        
        
        echo '<tr>';
        echo '<td>' . $row['itemNo'] . '</td>';
        echo '<td>' . $row['itemName'] . '</td>';
        echo '<td><a href="adminedit.php?var='.$row['itemNo'].'">' .'Edit'. '</a>'. '&nbsp;&nbsp;&nbsp;&nbsp;' .'<a href="admindelete.php?var='.$row['itemNo'].'">' .'Delete'. '</a></td>';

        echo '</tr>';
    }
  
}
    


echo '</table>';
    if(isset($_POST['submitsearch'])){
    if(mysqli_num_rows($result) == 0){
        echo 'No results found.';
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
