<?php

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
  
  header("location: admin.php?alert=1");
}

elseif((isset($_SESSION['role']) == '') || isset($_SESSION['role']) != 'user'){
  
  header("location: ezprinter.php?alert=4");
}


?>


<nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <a class="navbar-brand"><img style="width: 70px;" src="res/logo.png"></a>
       
        </div>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="userorder.php">My Orders</a></li>
            <li><a href="usercart.php">Cart</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="useraccount.php">Account</a></li>      
             <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Complaints
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="mycomplaints.php">My Complaints</a></li>
                <li><a href="complaint.php">File a Complaint</a></li>
              </ul>
            </li>
            <li><a href="logout.php">Logout</a></li>
          </ul>

      </div><!-- /.container -->
    </nav><!-- /.navbar -->