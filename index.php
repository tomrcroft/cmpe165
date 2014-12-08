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
		if (checkUserName($_POST['username']) == 0) {
			echo "Username taken.";
		} else {
			$realname = $_POST['realname'];
			$username = $_POST['username'];
			$password= $_POST['password'];
			$passwordverify = $_POST['passverify'];
            $question = $_POST['question'];
            $answer = $_POST['answer'];
			$email = $_POST['email'];
                
			if ($password == $passwordverify) {
		    	addUser($username, $realname, $password, $question, $answer,$email);
            	$_SESSION['username'] = $username;
			} else {
		    	echo "Passwords did not match.";
			}
		}
	}    
	if (isset($_GET['verify'])) {
		$verifyCode = $_GET['verify'];
		$username = $_GET['username'];
		confirmuser($username, $verifyCode);
	} 
	if (isset($_POST['submitConfirmBtn'])) {
		$username = $_SESSION['resetUsername'];
		if (validateSecurityAnswer($_POST['useranswer'], $username)) {			
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $tempPassword = '';

		    for ($i = 0; $i < 12; $i++) {
		        $tempPassword .= $characters[mt_rand(0, strlen($characters) - 1)];
		    }
				
			setTempPassword($username, $tempPassword);			
			sendPasswordResetMail($username, $tempPassword);
		} else {
			echo "Your answer to your security question is wrong.";
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
			
			<?php 
				/*if (isset($_SESSION['username'])) {
					// Get pins
					$pinIDs = getFeed($_SESSION['username']);

					for($i = 0; $i < count($pinIDs); $i++) {
						$pinImage = getPinImage($pinIDs[$i]);
						$pinDescription = getPinDescription($pinIDs[$i]);

						echo '<a href="#viewPin" data-toggle="modal" data-target="#viewPin"><div class="item"><img src="'.$pinImage.'" />';
						echo '<div class="footer" style="margin-bottom:10px">'.$pinDescription.'</div></div></a>';
					}
				}*/
			?>
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
