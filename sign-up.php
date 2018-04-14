<?php
ob_start();
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
  <title>EZ Printer</title>
</head>
<body>
    
 <?php

 include 'navbar.php';

 ?>

<!-- SIGN UP -->
    <div class="container"><br>
    <h3 class="text-left">SIGN UP</h3>
    <hr class="half-rule">
 <div class="form-group">
    <div class="col-md-6">
    <form action="" method="post">
      
      <div class="col-md-6">
      <div class="form-group row">
        <label>Username:<input class="form-control" type="text" name="signup-user" maxlength="20" minlength="6" required autofocus></label>
        </div> 
        </div>

         <div class="col-md-6">
      <div class="form-group row">
        <label>First Name:<input class="form-control" type="text" name="signup-fname" maxlength="20" required autofocus></label>
        </div> 
        </div>

         <div class="col-md-6">
      <div class="form-group row">
        <label>Last Name:<input class="form-control" type="text" name="signup-lname" maxlength="20" required autofocus></label>
        </div> 
        </div>

        <div class="col-md-6">
      <div class="form-group row">
        <label>Password:<input class="form-control" type="password" name="signup-pass" maxlength="20" minlength="6" required></label>
      </div>
        </div>

        <div class="col-md-6">
      <div class="form-group row">
          <label>Confirm Password:<input class="form-control" type="password" name="signup-confirm-pass" maxlength="20" minlength="6" required></label>
      </div>
        </div>

        

    </div>
      </div>
    </div>


    <div class="container">
    <div class="form-group">
      <div class="col-md-6">
       
        <div class="col-md-6">
      <div class="form-group row">
          <label>Address:<input class="form-control" type="text" name="signup-address" maxlength="50" required></label>
      </div>
      </div>

       <div class="col-md-6">
      <div class="form-group row">
          <label>Contact Number:<input class="form-control" type="text" name="signup-contact-no" maxlength="11" placeholder="09XXXXXXXXX" minlength="11" required></label>
      </div>
      </div>

        <div class="col-md-6">
      <div class="form-group row">
          <label>Email:<input class="form-control" type="email" name="signup-email" maxlength="30" placeholder="you@yourdomain.com" required></label>
      </div>
      </div>

      <div class="col-md-6">
      <div class="form-group row">
          <label>Paypal Email:<input class="form-control" type="email" name="signup-paypal-email" maxlength="30" placeholder="you@yourdomain.com"></label>
      </div>
      </div>

      <div class="col-md-11">
      <div class="form-group row">
          <input class="form-control" type="submit" name="signup" value="Submit">
      </div>
      </div>

    </form>

    </div>
    </div>
    </div>

<?php
  include 'footer.php';
include 'login.php';
 ?>


<?php

if(isset($_POST['signup'])){

$signupUser = $_POST['signup-user'];
$signupFname = $_POST['signup-fname'];
$signupLname = $_POST['signup-lname'];
$signupPass1 = $_POST['signup-confirm-pass'];
$signupPass = $_POST['signup-pass'];

if($signupPass1 == $signupPass){
$signupAddress = $_POST['signup-address'];
$signupContactno = $_POST['signup-contact-no'];
$signupEmail = $_POST['signup-email'];
$signupPaypalemail = $_POST['signup-paypal-email'];

$signuploginSQL = "INSERT INTO login (username, password, role) VALUES ('$signupUser', '$signupPass', 'user')"; 
mysqli_query($con,$signuploginSQL);

$signupuserinfoSQL = "INSERT INTO userinfo (username, firstname, lastname, useraddress, usercontactno, useremail, userpaypal) VALUES ('$signupUser', '$signupFname', '$signupLname', '$signupAddress', '$signupContactno', '$signupEmail', '$signupPaypalemail')"; 
$result = mysqli_query($con,$signupuserinfoSQL);


header("location: ezprinter.php?alert=2");
}else{
header("location: sign-up.php?alert=1");
}

}
mysqli_close($con);
?>

<?php
 if(isset($_GET['alert'])){
  $alert = $_GET['alert'];  
  if($alert == '1'){
    echo '<script>';
    echo 'alert("Password not the same.")';
    echo '</script>';
  }
}

?>
</body>
</html>