<?php
ob_start();

?>

<!DOCTYPE html>
<html>
<head>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="stylesheet.css" rel="stylesheet"> 
  <script src="js/bootstrap.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <title>Home</title>
</head>
<body>

<!-- NAVBAR -->
<?php

include 'usernavbar.php';

?>

<?php
if(isset($_GET['alert'])){

  $alert = $_GET['alert'];  
  if($alert == '1'){
    echo '<script>';
    echo 'alert("You are not allowed to access the page.")';
    echo '</script>';
  }

  }
header("location: userorder.php");
?>

</body>
</html>