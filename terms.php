<?php 
    session_start(); 
    include 'actions.php';

    if (isset($_POST['submitLogin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (verifyPassword($username, $password))
            $_SESSION['username'] = $username;
        else
            echo "Error. Incorrect username or password.";
    }

    if (isset($_POST['submitRegister'])) {
        global $con;

        $realname = mysqli_real_escape_string ($con, $_POST['realname']);
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password= mysqli_real_escape_string($con, $_POST['password']);
        $passwordverify = mysqli_real_escape_string($con, $_POST['passverify']);
                $question= mysqli_real_escape_string($con,$_POST['question']);
                $answer= mysqli_real_escape_string($con, $_POST['answer']);
                
        if ($password == $passwordverify) {
            addUser($username, $realname, $password, $question, $answer);
                    
        } else {
            echo "Passwords did not match.";
        }
    }       
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Corq</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/masonrystyle.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="color/default.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
   
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <!-- Preloader -->
    <div id="preloader">
        <div id="load"></div>
    </div>

    <!-- Get nav bar -->
    <?php include 'navbar.php' ?>
    <?php include 'reset.php'  ?>
   
    
    <section id="top" class="top">
    </section>
    

<!-- Section: services -->
    <section id="service" class="home-section text-center bg-gray">
        
        <div class="heading-about">
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.4s">
                    <div class="section-heading">
                    <h2>Terms and Conditions</h2>
                    <i class="fa fa-2x fa-angle-down"></i>

                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-lg-2 col-lg-offset-5">
                <hr class="marginbot-50">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <div class="wow fadeInLeft" data-wow-delay="0.2s">
                <div class="service-box">
                    <div class="service-icon">
                        <img src="img/icons/service-icon-1.png" alt="" />
                    </div>
                    <div class="service-desc">
                        <h5>Use</h5>
                        <p>Use by individuals under 13 is prohibited. By using Corq, you agree to any changes made to the terms and conditions of use.</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
                    <div class="service-icon">
                        <img src="img/icons/service-icon-2.png" alt="" />
                    </div>
                    <div class="service-desc">
                        <h5>Content</h5>
                        <p>Any content that you upload is property of Corq and you waive any right to legal ownership for any images, text, or other content that you upload.
                            You agree that Corq may use any content that you upload for any use that adds business value to Corq.</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
                    <div class="service-icon">
                        <img src="img/icons/service-icon-3.png" alt="" />
                    </div>
                    <div class="service-desc">
                        <h5>Miscellaneous</h5>
                        <p>Upon termination of your account Corq retains the rights to any content that you uploaded during your course of use.
                            While we take many precautions to protect your security, by using Corq you agree that Corq is not liable for any breach of security.
                            By using Corq, you agree that you may not sue Corq for any reason whatsoever.</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="wow fadeInRight" data-wow-delay="0.2s">
                <div class="service-box">
                    <div class="service-desc">
                        <h5>Insert Image</h5>
                        <p>Stock Image</p>
                    </div>
                </div>
                </div>
            </div>
        </div>      
        </div>
    </section>
    <!-- /Section: services -->



    <!-- Get login/register modal. -->
    <?php include 'loginmodal.php' ?>
    <!-- Get upload pin modal. -->
    <?php include 'pinmodal.php' ?>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="wow shake" data-wow-delay="0.4s">
                    <div class="page-scroll marginbot-30">
                        <a href="#top" id="totop" class="btn btn-circle">
                            <i class="fa fa-angle-double-up animated"></i>
                        </a>
                    </div>
                    </div>
                    <p>&copy;Copyright 2014 - Team Brouhaha, San Jose State University. Bootstrap theme by Squad. All rights reserved.<br>
                        <a href="contact.php"><font color="white">Contact</font></a> &nbsp; <a href="terms.php"><font color="white">Terms/Conditions</font></a></p>
                </div>
            </div>  
        </div>
    </footer>

    <!-- Core JavaScript Files -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script> 
    <script src="js/jquery.scrollTo.js"></script>
    <script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/masonry.pkgd.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDEwhWN-eoYsw3SDy5L8vnQEGYx4KdGKTk&sensor=false">

</body>

</html>
