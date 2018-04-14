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
    <link href="stylesheet.css" rel="stylesheet">
</head>
<body>

<?php

     include 'usernavbar.php';

    $id = $_GET['id'];
    $getticketassignment = "SELECT * FROM forum WHERE forumID = '$id'";
    $getticketassignmentresult = mysqli_query($con, $getticketassignment);
    $gtassignmentrow = mysqli_fetch_assoc($getticketassignmentresult);

    if($gtassignmentrow['assignedTo'] != ''){
    $nameofassignee = $gtassignmentrow['assignedTo'];
    $getassingmentname = "SELECT * FROM userinfo WHERE username = '$nameofassignee'";
    $result = mysqli_query($con, $getassingmentname);
    $resultrow = mysqli_fetch_assoc($result);

    $nameassigned = $resultrow['firstname'] .' ' . $resultrow['lastname'];
}
    if(empty($gtassignmentrow['assignedTo'])){
        $nameassigned = 'NOT YET ASSIGNED';
    }

    
?>

<div class="container">
  <h3>Ticket Handler</h3>
  <label>Assigned to:
  <select class="form-control" disabled>
  <option value="<?php echo $gtassignmentrow['assignedTo']?>"><?php echo $nameassigned;?></option>
  </select>
  </label>
    <div class="container-fluid">
    <div class="listview message">
        <div class="listview-body">

        <?php 

            $getmessages = "SELECT * FROM discussion WHERE forumID = '$id'";
            $getmessagesresult = mysqli_query($con, $getmessages);

            while($messagerows = mysqli_fetch_assoc($getmessagesresult)){

        ?>
                <?php 

                    if($messagerows['role'] == 'user' &&  $_SESSION['role'] == 'user'){
                ?>



                 <div class="message-series right" style="text-align: right;">
                <div class="admin-avatar pull-right">
                   <img src="<?php echo $messagerows['userImage'];?>" alt="prof-pic" class="dp" style="margin-top: 35px;">
                </div>
                <div class="message-body">
               <h4>Title: <?php echo $gtassignmentrow['title'] . ' | '. 'Category: ' . $gtassignmentrow['category'] .  ' | ' .'Product: ' . $gtassignmentrow['productName'];?></h4>
                    <div class="message-content text-left">
                         <p class="text-right"><?php echo $messagerows['description'];?></p>
                    </div><br>
                    <small class="date" style="margin-right: 100px;">
                         <span class="glyphicon glyphicon-time"><?php echo $messagerows['dateandtime'] . ' '.$messagerows['nameUser']; ?></span>
                    </small>
                </div>
            </div>




      
                <?php }else{?>



                 <div class="message-series">
                <div class="user-avatar pull-left">
                  <img src="<?php echo $messagerows['adminImg'];?>" alt="admin-pic" class="dp">
                </div>
                <div class="message-body">
                   <h4>Title: <?php echo $gtassignmentrow['title'] . ' | '. 'Category: ' . $gtassignmentrow['category'] .  ' | ' .'Product: ' . $gtassignmentrow['productName'];?></h4>

                    <div class="message-content">
                        <p class="text-left"><?php echo $messagerows['description'];?></p>
                    </div><br>
                    <small class="date" style="margin-left: 100px;">
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

        date_default_timezone_set("Asia/Manila");
        $date = date("Y-m-d h:i:sa");

        $username = $_SESSION['username'];
        $getnameofuser = "SELECT * FROM userinfo WHERE username = '$username'";
        $getuser = mysqli_query($con, $getnameofuser);
        $rowUser = mysqli_fetch_assoc($getuser);

        $firstname = $rowUser['firstname'];
        $lastname = $rowUser['lastname'];
        $completename = $firstname .' '. $lastname;
        $userImage = $rowUser['userImage'];
        $role = 'user';

        //this is the sql for sending data to forum and discussion table.

        $sqlgettheforumIDSQL = "SELECT MAX(forumID) FROM forum";
        $res = mysqli_query($con, $sqlgettheforumIDSQL);
        $row = mysqli_fetch_assoc($res);

        $forumID = $row['MAX(forumID)'];
        $senddatadiscussionSQL = "INSERT INTO discussion (forumID, dateandtime, description, nameUser, userImage, role) VALUES ('$forumID','$date', '$description', '$completename', '$userImage', '$role')";
        mysqli_query($con, $senddatadiscussionSQL);
        header("location:replytocomplaint.php?id=". $id);
        mysqli_close($con);
    }

?>

</body>
</html>