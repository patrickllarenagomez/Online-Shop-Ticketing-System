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

 include 'usernavbar.php';

 ?>

 <?php 

 $username = $_SESSION['username'];
 $getdata = "SELECT * FROM userinfo WHERE username = '$username'";
 $result = mysqli_query($con, $getdata);
 $row = mysqli_fetch_assoc($result);

 $getpass = "SELECT * FROM login WHERE username = '$username'";
 $res = mysqli_query($con, $getpass);
 $rowlog = mysqli_fetch_assoc($res);
 ?>

    <!-- ACCOUNT -->


        <div class="container"><br>
        <h3 class="text-left">ACCOUNT</h3>
        <hr class="half-rule">
     <div class="form-group">
        <div class="col-md-6">
        <form action="" id="form1" method="post" enctype= "multipart/form-data">

               <div class="col-md-6">
            <div class="form-group row">
              <label>First Name:<input class="form-control" type="text" name="first-name" maxlength="20" value='<?php echo $row['firstname']; ?>' required autofocus></label>
              </div> 
              </div>

               <div class="col-md-6">
            <div class="form-group row">
              <label>Last Name:<input class="form-control" type="text" name="last-name" maxlength="20" value='<?php echo $row['lastname']; ?>' required autofocus></label>
              </div> 
              </div>

              <div class="col-md-6">
            <div class="form-group row">
              <label>Password:<input class="form-control" type="password" name="password" maxlength="20" minlength="6" value='<?php echo $rowlog['password']; ?>' required></label>
            </div>
              </div>

              <div class="col-md-6">
            <div class="form-group row">
                <label>Confirm Password:<input class="form-control" type="password" name="confirm-pass" maxlength="20" minlength="6" value='<?php echo $rowlog['password']; ?>' required></label>
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
                <label>Address:<input class="form-control" type="text" name="address" maxlength="50" value='<?php echo $row['useraddress']; ?>' required></label>
            </div>
            </div>

             <div class="col-md-6">
            <div class="form-group row">
                <label>Contact Number:<input class="form-control" type="text" name="contact-no" maxlength="11" placeholder="09XXXXXXXXX" minlength="11" value='<?php echo $row['usercontactno']; ?>' required></label>
            </div>
            </div>

              <div class="col-md-6">
            <div class="form-group row">
                <label>Email:<input class="form-control" type="email" name="email" maxlength="30" placeholder="you@yourdomain.com" value='<?php echo $row['useremail']; ?>' required></label>
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group row">
                <label>Paypal Email:<input class="form-control" type="email" name="paypal-email" maxlength="30" value='<?php echo $row['userpaypal']; ?>' placeholder="you@yourdomain.com"></label>
            </div>
            </div>

            <div class="col-md-6">
                   <label>Profile Picture:<input class="form-control" type="file" id="imgInp" name="fileToUpload"></label>
            </div>
                    <img id="blah" src="#" alt="Waiting for upload" width="200px" height="200px"/>
            <div class="col-md-11">
            <div class="form-group row">
                <input class="form-control" type="submit" name="submit" value="Update">
            </div>
            </div>

             
        </form>


      <?php

          if(isset($_POST['submit'])){

              $target_dir = "res/";
              $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
              $uploadOk = 1;
              $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
              // Check if image file is a actual image or fake image
              
                  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                      $uploadOk = 1;
                  } else {
                      echo "File is not an image.";
                      $uploadOk = 0;
                  }
              
              // Check if file already exists
              if (file_exists($target_file)) {
                  echo "Sorry, file already exists.";
                  $uploadOk = 0;
              }
              // Check file size
              if ($_FILES["fileToUpload"]["size"] > 500000) {
                  echo "Sorry, your file is too large.";
                  $uploadOk = 0;
              }
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" ) {
                  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                  $uploadOk = 0;
              }
              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                  echo "Sorry, your file was not uploaded.";
              // if everything is ok, try to upload file
              } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                      echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                  } else {
                      echo "Sorry, there was an error uploading your file.";
                  }
              }

                      $fname = $_POST['first-name'];
                      $lname = $_POST['last-name'];
                      $password = $_POST['password'];
                      $confirmpass = $_POST['confirm-pass'];
                      if($password == $confirmpass){

                      $address = $_POST['address'];
                      $contactno = $_POST['contact-no'];
                      $email = $_POST['email'];
                      $paypal = $_POST['paypal-email'];
                      $img = $target_file;

                      $updatelogininfo = "UPDATE login SET password = '$password' WHERE username = '$username'";
                      mysqli_query($con, $updatelogininfo);

                      $getthename = "SELECT * FROM userinfo WHERE username ='$username'";
                      $getthenameresult = mysqli_query($con, $getthename);
                      $nameoftheuser = mysqli_fetch_assoc($getthenameresult);

                      $thisisthename = $nameoftheuser['firstname'] . ' ' . $nameoftheuser['lastname'];

                      $updatediscussioninfo = "UPDATE discussion SET userImage = '$img' WHERE nameUser = '$thisisthename'";
                      mysqli_query($con, $updatediscussioninfo);

                      $updateuserinfo = "UPDATE userinfo SET firstname = '$fname', lastname = '$lname', useraddress = '$address', usercontactno = '$contactno', useremail = '$email', userpaypal = '$paypal', userImage = '$img' WHERE username = '$username'";
                      mysqli_query($con, $updateuserinfo);
                      header("location: useraccount.php?alert=1");
                      mysqli_close($con);
                    }else{
                      header("location: useraccount.php?alert=2");
                    }
                }
                  ?>


      </div>
     </div>
    </div>

<?php
    

    if(isset($_GET['alert'])){
      $alert = $_GET['alert'];
      if($alert == 1){
    echo "<script>alert('User details updated.');</script>";  
      }
      elseif($alert == 2){
    echo "<script>alert('Passwords are not the same.');</script>";  
      }
    }

?>

<script>
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
  $("#imgInp").change(function(){
        readURL(this);
    });

    </script>
</body>
</html>