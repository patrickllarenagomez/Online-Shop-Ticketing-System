<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="stylesheetadmin.css" rel="stylesheet">	
	<script src="js/bootstrap.js" type="text/javascript"></script>
	   <script src="jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
	<title>Admin</title>
</head>
<body>


<?php 

include 'adminnav.php';

?>
<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>
                <div class="panel-body">
                	<h3> Add Product </h3>
                	<form action="" id="form1" method="post" enctype= "multipart/form-data">
                		<div>
                		<div class="row">
                		<div class="col-md-10">
                		<label>Product Name:<input class="form-control" type="text" name="itemName" maxlength="30" required autofocus></label>
                		</div>
                		<div class="col-md-10">
                		<label>Product Description:<textarea rows="7" cols="50" class="form-control" name="itemDescription" maxlength="255"required></textarea></label>
                		</div>
                		<div class='col-md-10'>
                		<label>Stocks:<input class="form-control" type="text" name="itemQuantity" maxlength="4" required></label>
                		</div>

                		<div class="col-md-10">
                		<label>Price<input class="form-control" type="text" name="itemPrice" maxlength="10" required></label>
                		</div>
                		<div class="col-md-8">
                			<label>Select image to be uploaded.<input class="form-control" type="file" id="imgInp" name="fileToUpload"></label>
                			<img id="blah" src="#" alt="your image" />
    					</div>
    					
    					</div>
    					<div class="col-md-2 row">
    						<input class="form-control" type="submit" value="Submit" name="submitproduct">
    					</div>
    					</div>
    				</form>

 	               	<?php
 	          
 	         	 	if(isset($_POST['submitproduct'])){

 	               			$target_dir = "res/";
							$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
							$uploadOk = 1;
							$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
							// Check if image file is a actual image or fake image
							
							    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
							    if($check !== false) {
							       // echo "File is an image - " . $check["mime"] . ".";
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
							if ($_FILES["fileToUpload"]["size"] > 5000000) {
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

						if($uploadOk == 0){
							echo "<script>";
							echo "alert('Error: File not uploaded');";
							echo "</script>";
						}else{

 	               			$itemName = $_POST['itemName'];
 	               			$itemDescription = $_POST['itemDescription'];
 	               			$itemQuantity = $_POST['itemQuantity'];
 	               			$itemPrice = $_POST['itemPrice'];
 	               			$img = $target_file;


 	               			$addproduct = "INSERT INTO items (itemName, itemDescription, itemQuantity, itemPrice, itemImage) VALUES ('$itemName', '$itemDescription', '$itemQuantity', '$itemPrice', '$img')";
 	               			$result = mysqli_query($con, $addproduct);
 	               			mysqli_close($con);
 	               			}
 	               		}

                	?>
                </div>
            </div>
		</div>

		<!-- FOOTER -->
		<footer class="pull-left footer">
			<p class="col-md-12">
				<hr class="divider">
				Copyright &COPY; 2017 <a href="http://ez-printer.000webhostapp.com">EZPrinter</a>
			</p>
		</footer>
	</div>

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