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
    
	<!-- Section: intro -->
    <section id="intro" class="intro">
	
		<div class="slogan">
			<h2>Corq</span> </h2>
			<h4>feed me</h4>
		</div>
		<div class="page-scroll">
			<a href="#feed" class="btn btn-circle">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
		</div>
    </section>
	<!-- /Section: intro -->


 	<section id="feed" class="home-section text-center">
        <div class="heading-contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wow bounceInDown" data-wow-delay="0.4s">
                            <div class="section-heading">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Show all pins based on board ID -->
        <div id="pin-container" class="masonry js-masonry"  data-masonry-options='{ "columnWidth": 310, "itemSelector": ".item", "isFitWidth": true }'>
			
            <!-- TODO: PHP code here: fill feed with newest posts from all followers in reverse time/date order. Below are just dummies -->
            <a href="#viewPin" data-toggle="modal" data-target="#viewPin"><div class="item"><img src="img/pins/pidgeotto.gif" /></div></a>
            <div class="item"><img src="img/pins/tumblr_n8cwonFIBH1tbe79ko1_1280.jpg" /></div>
            <div class="item"><img src="img/pins/Ben-Affleck-in-Batman-vs.-Superman-2016-Movie-Image1.jpg" /></div>
            <div class="item"><img src="img/pins/tumblr_n96doc8WMO1rtpgrxo1_500.jpg" /></div>
            <div class="item"><img src="img/pins/Ben-Affleck-in-Batman-vs.-Superman-2016-Movie-Image1.jpg" /></div>
            <div class="item"><img src="img/pins/tumblr_na2lcm9Qg71r9kz6do2_500.jpg" /></div>
            <div class="item"><img src="img/pins/patrick.png" /></div>
            <div class="item"><img src="img/pins/pidgeotto.gif" /></div>
            <div class="item"><img src="img/pins/tumblr_na2lcm9Qg71r9kz6do2_500.jpg" /></div>
            <div class="item"><img src="img/pins/tumblr_n8cwonFIBH1tbe79ko1_1280.jpg" /></div>
            <div class="item"><img src="img/pins/patrick.png" /></div>
            <!-- end dummy code -->


        </div>
	</section>
	



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
