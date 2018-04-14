<?php
ob_start();


session_start();
include 'connect.php';

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
    <script src="js/jqueryshop.js"></script>

	<title>Shop</title>
</head>
<body>

<?php

if(isset($_SESSION['role']) && $_SESSION['role'] == 'user'){

    include 'usernavbar.php';

}else{
    include 'navbar.php';
}
?>



<div class="container"> 
		<br>
	<h3 class="text-left"> Shop </h3>
	<hr class="half-rule">
	</div>

<?php


$shopSQL = "SELECT * FROM items";

$result = mysqli_query($con, $shopSQL);

	
?>

<!-- SHOP -->

<div class="container">
     <div class="well well-sm">
        <strong>Printers</strong>
            
        <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                class="glyphicon glyphicon-th"></span>Grid</a>
        </div>
    
</div>

    <div id="products" class="row list-group">
    <?php 
    while($products = mysqli_fetch_assoc($result)){ ?>
        <div class="item col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="<?php echo $products['itemImage'];?>">
                <div class="caption">
                    <h4 class="group inner list-group-item-heading text-center">Product ID:<?php echo $products['itemNo'];?></h4>
                    <h4 class="group inner list-group-item-heading text-center"><?php echo $products['itemName'];?></h4>
                    <p class="group inner list-group-item-text text-left description"><?php echo $products['itemDescription'];?></p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6"><br>
                            <p class="text-left"><b>Stocks Left: <?php echo $products['itemQuantity'];?></b></p>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <p class="lead text-left">Price: <?php echo $products['itemPrice'];?></p>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" href='addtousercart.php?id=<?php echo $products['itemNo'];?>'>Buy Product</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   <?php } ?>     
</div>

</div>



<hr class="half-rule">
<?php


include 'footer.php';
include 'login.php';

?>


<?php
if(isset($_GET['alert'])){
    $alert = $_GET['alert'];
if($alert == '1'){
echo '<script>';
echo 'alert("Please login to buy product.")';
echo '</script>';
}
if($alert == '2'){
echo '<script>';
echo 'alert("Product added to cart.")';
echo '</script>';
}
}

?>
</body>
</html>