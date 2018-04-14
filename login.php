<?php


if(isset($_POST['sign-in'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $loginSQL = "SELECT * FROM login WHERE BINARY username = BINARY '$username' AND BINARY password = BINARY '$password'";

  $result = mysqli_query($con, $loginSQL);

  $count = mysqli_num_rows($result);

  if($count==1){

    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];

    if($row['role'] == 'admin'){
      header("location: admin.php");
    }elseif($row['role'] == 'user'){

    header("location: home.php");
  
  }else{
    header("location:admin.php");
  }
}else{
  echo '<script>';
  echo 'alert("Username and Password do not match!")';
  echo '</script>';
}
}

?>