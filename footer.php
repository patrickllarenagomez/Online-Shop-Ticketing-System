 <!-- FACEBOOK -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '279848295802240',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

 <!-- FOOTER -->

<footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4  col-md-3 col-sm-6 col-xs-12">
                    <h3> Company </h3>
                    <ul>
                        <li> <a href="about.php"> About </a> </li>
                        <li> <a href="shop.php"> Shop </a> </li>
                        <li> <a href="contact-us.php"> Contact Us </a> </li>
                        <li> <a href="sign-up.php"> Sign Up </a> </li>
                    </ul>
                </div>
                <div class="col-md-4  col-md-3 col-sm-6 col-xs-12">
                    <h3> Promo Codes </h3>
                    <ul>
                        <li> <a href="https://www.roblox.com/promocodes"> Roblox </a> </li>
                        <li> <a href="https://www.coupons.com/coupon-codes/"> Coupons </a> </li>
                        <li> <a href="https://www.groupon.com"> Groupon </a> </li>
                        <li> <a href="https://slickdeals.net/"> Slick Deals </a> </li>
                    </ul>
                </div>
        <div class="col-lg-1  col-md-3 col-sm-6 col-xs-12">
                </div>
               <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
               <h3> Get Newsletters! </h3>
                    <ul>
                        <li>
                            <div class="input-append newsletter-box text-center">
                            <form action="" method="post" >
                                <input type="email" class="full text-center" placeholder="Email " name="newsletter_email">
                                <button class="btn  bg-gray" type="submit" name="submitnewsletter"> Newsletter <i class="fa fa-long-arrow-right"> </i> </button>
                            </form>
                            </div>
                        </li>
                    </ul>
                 <ul class="social">
                        <li> <a href="https://www.facebook.com/ezprinter"> <i class=" fa fa-facebook">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                    </ul>
                <div class="fb-share-button pull-right" data-href="http://ez-printer.000webhostapp.com/ezprinter.php" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fez-printer.000webhostapp.com%2Fezprinter.php&amp;src=sdkpreparse">Share</a></div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->
    


    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> Copyright © EZPrinter. All right reserved. </p>
            <div class="pull-right">
                <ul class="nav nav-pills payments">
                  <li><i class="fa fa-cc-visa"></i></li>
                    <li><i class="fa fa-cc-mastercard"></i></li>
                    <li><i class="fa fa-cc-amex"></i></li>
                    <li><i class="fa fa-cc-paypal"></i></li>
                </ul> 
            </div>
        </div>
    </div>
    <!--/.footer-bottom--> 
</footer>

<?php


if(isset($_POST['submitnewsletter'])){

$newsletter_email = $_POST['newsletter_email'];

$newsletterSQL = "INSERT INTO newsletter (newsletter_email) VALUES ('$newsletter_email')";

mysqli_query($con, $newsletterSQL);
header("location:ezprinter.php?alert=3");
mysqli_close($con);
}

?>