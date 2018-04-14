<?php
ob_start();
session_start();
include 'connect.php';


?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <title>Message</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="stylecomplaint.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="admin.php">
                EZPrinters
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">            
            
            <ul class="nav navbar-nav navbar-right">
                <li><a>Welcome ADMIN!</a></li>
                <li><a href="admin.php">Home</a></li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        <!-- /.container-fluid -->
        </nav>
<?php


    $id = $_GET['id'];
    $getticketassignment = "SELECT * FROM forum WHERE forumID = '$id'";
    $getticketassignmentresult = mysqli_query($con, $getticketassignment);
    $gtassignmentrow = mysqli_fetch_assoc($getticketassignmentresult);



?>

<div class="container">
  <h3>Ticket Handler</h3>
  <form action="" method="post">

  <label>Assigned to:
  <select class="form-control" name="selectedadmin">
  <?php 
    $getdataforoption = "SELECT * FROM userinfo WHERE userImage ='res/admin.png'";
    $resultofgetdataoption = mysqli_query($con, $getdataforoption);
    
    while($getdataforoption = mysqli_fetch_assoc($resultofgetdataoption)){
  ?>
  <option value="<?php echo $getdataforoption['username']?>"><?php echo $getdataforoption['firstname'] . ' ' . $getdataforoption['lastname'];?></option>
  
<?php } ?>
  </select>
  

  
  <input class="form-control" type="submit" name="updateassignment" value="Update">
  </label> 
 </form>
    <div class="container-fluid">
    <div class="listview message">
        <div class="listview-body">

        <?php 

            $getmessages = "SELECT * FROM discussion WHERE forumID = '$id'";
            $getmessagesresult = mysqli_query($con, $getmessages);

            while($messagerows = mysqli_fetch_assoc($getmessagesresult)){

        ?>
                <?php 

                    if($messagerows['role'] == 'user'){
                ?>
            <div class="message-series">
                <div class="user-avatar pull-left">
                    <img src="<?php echo $messagerows['userImage'];?>" alt="prof-pic" class="dp" style="margin-top: 35px;">
                </div>
                <div class="message-body">
                  <h4>Title: <?php echo $gtassignmentrow['title'] . ' | '. 'Category: ' . $gtassignmentrow['category'] .  ' | ' .'Product: ' . $gtassignmentrow['productName'];?></h4>

                    <div class="message-content">
                        <p><?php echo $messagerows['description'];?></p>
                    </div><br>
                    <small class="date" style="margin-left: 100px;">
                        <span class="glyphicon glyphicon-time"><?php echo $messagerows['dateandtime'] . ' '.$messagerows['nameUser']; ?></span>
                    </small>
                </div>
            </div>
                <?php }else{?>
            <div class="message-series right" style="text-align: right;">
                <div class="admin-avatar pull-right">
                    <img src="<?php echo $messagerows['adminImg'];?>" alt="admin-pic" class="dp">
                </div>
                <div class="message-body">
                <h4>Title: <?php echo $gtassignmentrow['title'] . ' | '. 'Category: ' . $gtassignmentrow['category'] .  ' | ' .'Product: ' . $gtassignmentrow['productName'];?></h4>
                    <div class="message-content text-left">
                        <p class="text-right"><?php echo $messagerows['description'];?></p>
                    </div><br>
                    <small class="date" style="margin-right: 100px;">
                        <span class="glyphicon glyphicon-time"><?php echo $messagerows['dateandtime'] . ' '.$messagerows['nameAdmin']. ' | ' . $messagerows['positionAdmin']; ?></span>
                    </small>
                </div>
            </div>
        <?php }}?>
            <form action="" method="post">
            <div class="listview-reply">
                <textarea placeholder="Write message .." name="description"></textarea>
                <button class="btn btn-sm btn-primary" type="submit" style="position: relative; display: inline-block; top: -30px;" name="submitreply">SEND</button>
            </div>
            </form>
        </div>
    </div>
    </div>
</div>

<?php

    if(isset($_POST['submitreply'])){
        $description = $_POST['description'];
        $id = $_GET['id'];
        date_default_timezone_set("Asia/Manila");
        $date = date("Y-m-d h:i:sa");

        $username = $_SESSION['username'];
        $getnameofuser = "SELECT * FROM userinfo WHERE username = '$username'";
        $getuser = mysqli_query($con, $getnameofuser);
        $rowUser = mysqli_fetch_assoc($getuser);

        $firstname = $rowUser['firstname'];
        $lastname = $rowUser['lastname'];
        $completename = $firstname .' '. $lastname;
        $adminImage = $rowUser['userImage'];

        
        $getroleofuser = "SELECT * FROM login WHERE username = '$username'";
        $getrole = mysqli_query($con, $getroleofuser);
        $rowrole = mysqli_fetch_assoc($getrole);

        $role = $rowrole['role'];

        //this is the sql for sending data to forum and discussion table.
       
        $senddatadiscussionSQL = "INSERT INTO discussion (forumID, dateandtime, description, nameAdmin, positionAdmin, adminImg, role) VALUES ('$id','$date', '$description', '$completename', '$role', '$adminImage', 'admin')";

        $result = mysqli_query($con, $senddatadiscussionSQL);
        $sad = mysqli_fetch_assoc($result);
        header("location:replytocomplaintadmin.php?id=". $id);
        mysqli_close($con);


    }

    if(isset($_POST['updateassignment'])){
        $assignment = $_POST['selectedadmin'];

        $updateSQL = "UPDATE forum SET assignedTo = '$assignment' WHERE forumID = '$id'";
        mysqli_query($con, $updateSQL);
        mysqli_close($con);
        header("location: admin.php?alert=2");
    }
?>

<?php 
if(isset($_GET['alert'])){
$alert = $_GET['alert'];
if($alert == '1'){
echo "<script>";
echo "alert('Assignment Updated.');";

echo "</script>";
}
}
?>
</body>
</html>