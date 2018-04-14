<?php

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

if(isset($_SESSION['username']) && $_SESSION['role'] == 'user'){

  header("location: userorder.php");
}


elseif(isset($_SESSION['username']) && $_SESSION['username'] == 'admin'){
  header("location: admin.php");
}
?>


<!--sign in -->
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        <a class="navbar-brand" href="ezprinter.php"><img style="width: 70px;" src="res/logo.png">
       
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-2">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="ezprinter.php">Home</a></li>
            <li><a href="about.php">About EZPrinters</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="contact-us.php">Contact Us</a></li>
            <li><a href="sign-up.php">Sign Up</a></li>
            <li><a href="complaint.php">File a complaint</a></li>
            <li>
              <a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">Sign in</a>
            </li>
          </ul>
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
            <form action="" method="post" class="navbar-form navbar-right form-inline" role="form">
              <div class="form-group">
                <label class="sr-only" for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" autofocus required />
              </div>
              <div class="form-group">
                <label class="sr-only" for="Password">Password</label>
                <input type="password" class="form-control" id="Password" placeholder="Password" name="password" required />
              </div>
              <button type="submit" class="btn btn-success" name="sign-in">Sign in</button>
            </form>
          </div>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->