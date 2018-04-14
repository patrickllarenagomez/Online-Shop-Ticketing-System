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
    <title>Complaint Form</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="stylesheet.css" rel="stylesheet">
    <style>
        
        .col-lg-12{
            display: flex; 
            justify-content: center;
        }
        textarea{
            margin: 30px 0 0 20px;
            width: 95%; 
            height: 300px;
            padding: 5px 7px;
        }
        .btn {
            margin: 0 50px 0 50px;
            position: relative;
        }
    </style>
</head>


<body>
<?php 
    
    include 'usernavbar.php';
    $username = $_SESSION['username'];
    $populateselect = "SELECT * FROM productorder WHERE username = '$username' AND isDelivered = 'DELIVERED'";
    $result = mysqli_query($con, $populateselect);


?>
<div class="container">
    <div class="col-lg-12">
        <div class="panel panel-info" style="width: 80%;">
            <div class="panel-heading text-center">
                <h3><strong>Product Complaint</strong></h3>
                <p>(Please select the product you bought.)</p>
            </div>
            <div class="panel-body">
            <form action="" method="post">
              <div>
                <h3 style="margin: 10px 0px;" class="text-left">Complaint Form <img class="d-inline" width="40px" height="40px" src="https://d30y9cdsu7xlg0.cloudfront.net/png/89569-200.png"></h3>
                
                  <div class="form-group col-md-4">
            <div class="form-group row">
                <div class="col-sm-10">
                     <label>Product:</label>
                      <select class="form-control" name="productName" required>
                      <?php while($row = mysqli_fetch_assoc($result)){
                                $itemNo = $row['itemNo'];
                                $sqlItem = "SELECT * FROM items WHERE itemNo = '$itemNo'";
                                $resultItem = mysqli_query($con, $sqlItem);
                            while($rowItem = mysqli_fetch_assoc($resultItem)){

                                ?>
                <option value="<?php echo $rowItem['itemName']?>"><?php echo $row['orderID']. '.) '; echo $rowItem['itemName'];?></option>
                <?php }} ?>
                </select>
                </div>
                 </div>
            </div>

               <div class="form-group col-md-4">
             <div class="form-group row">
                <div class="col-sm-8">
                     <label>Category:</label>
                     <select class="form-control d-inline" name="category" required>
                <option value="Troubleshooting">Troubleshooting</option>
                <option value="Replacement">Replacement</option>
                <option value="Return">Return</option>
                </select>
                </div>
             </div>
             </div>

              
                 <input class="form-control" type="text" placeholder="Most Related Keyword/Product Issue" name="title" required>
                <div class="col-md-11">
                <div class="col-md-8">
                   
                      
                        
              </div>
                <textarea class="form-control" placeholder="Write it here." cols="10" rows="5" name="description" required></textarea><br>
                <div>
                            <input type="submit" class="btn btn-primary" name="submit" value="SUBMIT">
                            <input type="reset" class="btn btn-primary" value="RESET">
                    </div>
                </div>
                     
            </form>

            </div>
        </div>
    </div>
</div>

<?php

    if(isset($_POST['submit'])){
        $productName = $_POST['productName'];
        $category = $_POST['category'];
        $title = $_POST['title'];
        date_default_timezone_set("Asia/Manila");
        $date = date("Y-m-d h:i:sa");
        $description = $_POST['description'];


        $getnameofuser = "SELECT * FROM userinfo WHERE username = '$username'";
        $getuser = mysqli_query($con, $getnameofuser);
        $rowUser = mysqli_fetch_assoc($getuser);

        $firstname = $rowUser['firstname'];
        $lastname = $rowUser['lastname'];
        $completename = $firstname .' '. $lastname;
        $userImage = $rowUser['userImage'];
        $role = 'user';

        //this is the sql for sending data to forum and discussion table.

        $senddataforumSQL = "INSERT INTO forum (title, productName, username, postedBy, category) VALUES ('$title', '$productName', '$username', '$completename', '$category')";
        mysqli_query($con, $senddataforumSQL);

        $sqlgettheforumIDSQL = "SELECT MAX(forumID) FROM forum";
        $res = mysqli_query($con, $sqlgettheforumIDSQL);
        $row = mysqli_fetch_assoc($res);

        $forumID = $row['MAX(forumID)'];
        $senddatadiscussionSQL = "INSERT INTO discussion (forumID, dateandtime, description, nameUser, userImage, role) VALUES ('$forumID','$date', '$description', '$completename', '$userImage', '$role')";
        mysqli_query($con, $senddatadiscussionSQL);
        header("location:complaint.php?alert=1");
        mysqli_close($con); 
    }

     if(isset($_GET['alert'])){
    $alert = $_GET['alert'];    
    if($alert == '1'){
        echo '<script>';
        echo 'alert("Complaint Form submitted.")';
        echo '</script>';
    }
}
?>
</body>
</html>