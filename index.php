<?php 
	session_start(); 
	include 'actions.php';

	if (isset($_POST['submitLogin'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (verifyLogin($username, $password))
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

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">
   
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
			<a href="#service" class="btn btn-circle">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
		</div>
    </section>
	<!-- /Section: intro -->


	<!-- Section: services -->
    <section id="service" class="home-section text-center bg-gray">
		
		<div class="heading-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown" data-wow-delay="0.4s">
							<div class="section-heading">
								<h2>Our Services</h2>
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
								<h5>Learn, Share, or Discover</h5>
								<p>new interests that your peers find interesting. 
									It could be rock climbing, cooking, or even sleeping, come join our family and start sharing.</p>
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
								<h5>Web Design</h5>
								<p>Vestibulum tincidunt enim in pharetra malesuada. Duis semper magna metus electram accommodare.</p>
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
								<h5>Photography</h5>
								<p>Vestibulum tincidunt enim in pharetra malesuada. Duis semper magna metus electram accommodare.</p>
							</div>
		                </div>
					</div>
	            </div>

				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInRight" data-wow-delay="0.2s">
		                <div class="service-box">
							<div class="service-icon">
								<img src="img/icons/service-icon-4.png" alt="" />
							</div>
							<div class="service-desc">
								<h5>Cloud System</h5>
								<p>Vestibulum tincidunt enim in pharetra malesuada. Duis semper magna metus electram accommodare.</p>
							</div>
		                </div>
					</div>
	            </div>
	        </div>		
		</div>
	</section>
	<!-- /Section: services -->



	<!-- Section: about -->
    <section id="about" class="home-section text-center">
		<div class="heading-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown" data-wow-delay="0.4s">
							<div class="section-heading">
								<h2>About us</h2>
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
	            <div class="col-xs-6 col-sm-3 col-md-3">
					<div class="wow bounceInUp" data-wow-delay="0.2s">
		                <div class="team boxed-grey">
		                    <div class="inner">
								<h5>Anna Hanaceck</h5>
		                        <p class="subtitle">Pixel Crafter</p>
		                        <div class="avatar"><img src="img/team/1.jpg" alt="" class="img-responsive img-circle" /></div>
		                    </div>
		                </div>
					</div>
	            </div>

				<div class="col-xs-6 col-sm-3 col-md-3">
					<div class="wow bounceInUp" data-wow-delay="0.5s">
		                <div class="team boxed-grey">
		                    <div class="inner">
								<h5>Maura Daniels</h5>
		                        <p class="subtitle">Ruby on Rails</p>
		                        <div class="avatar"><img src="img/team/2.jpg" alt="" class="img-responsive img-circle" /></div>
		                    </div>
		                </div>
					</div>
	            </div>

				<div class="col-xs-6 col-sm-3 col-md-3">
					<div class="wow bounceInUp" data-wow-delay="0.8s">
		                <div class="team boxed-grey">
		                    <div class="inner">
								<h5>Jack Briane</h5>
		                        <p class="subtitle">jQuery Ninja</p>
		                        <div class="avatar"><img src="img/team/3.jpg" alt="" class="img-responsive img-circle" /></div>
		                    </div>
		                </div>
					</div>
	            </div>

				<div class="col-xs-6 col-sm-3 col-md-3">
					<div class="wow bounceInUp" data-wow-delay="1s">
		                <div class="team boxed-grey">
		                    <div class="inner">
								<h5>Tom Petterson</h5>
		                        <p class="subtitle">Typographer</p>
		                        <div class="avatar"><img src="img/team/4.jpg" alt="" class="img-responsive img-circle" /></div>
		                    </div>
		                </div>
					</div>
	            </div>
	        </div>		
		</div>
	</section>
	<!-- /Section: about -->
	



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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script> 
    <script src="js/jquery.scrollTo.js"></script>
    <script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>

</body>

</html>
