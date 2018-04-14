<?php


if(isset($_POST['submitnewsletter'])){
$newsletterSQL = "INSERT INTO newsletter (newsletter_email) VALUES ('$newsletter_email')";

mysqli_query($con, $newsletterSQL);
header("location:ezprinter.php?alert=3");
}
?>