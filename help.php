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
								<h2>Help Center</h2>
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
								<a href="#pins"><h5>Pins</h5></a>
								<p>  </p>
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
								<a href="#boards"><h5>Boards</h5></a>
								<p>   </p>
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
								<a href="#profile"><h5>Profile</h5></a>
								<p>        </p>
							</div>
		                </div>
					</div>
	            </div>
	        </div>		
		</div>
	</section>
	<!-- /Section: services -->

	<!-- section: pins-->

	<a name="pins"><section id="service" class="home-section text-center bg-gray"></a>
		
		<div class="heading-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown" data-wow-delay="0.4s">
							<div class="section-heading">
								<h2>PINS</h2>
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
								<h5>What are pins?</h5>
								<p>Pins are posts. Each Pin contains an image, a title, a description, and a list of comments. If the pin contains details of a restaurant, add its location with the map button.</p>
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
								<h5>Cool, but how do I use them?</h5> 
								<p>Click "Pin It" in the navigation bar at the top, then fill out the form. Hit submit and your pin will appear on the board, or find a pin you like and hit the "Pit It" button.</p>
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
								<h5>Alright, but what can I pin?</h5>
								<p>Pin images, text, or images with text. No need to limit yourself to one choice. Insert an image URL or just type into the description to post a text post.</p>
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
								<h5>Neat. Where can I find more pins?</h5>
								<p>Use the search function at the top of the page to find users, pins, and boards. Type in what you're looking for and it'll give you a list of related results.</p>
							</div>
		                </div>
					</div>
	            </div>
	        </div>		
		</div>
	</section>
 	<!-- /section: pins-->


 	<!-- section: boards-->
 	<a name="boards"><section id="service" class="home-section text-center bg-gray"></a>
		
		<div class="heading-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown" data-wow-delay="0.4s">
							<div class="section-heading">
								<h2>Boards</h2>
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
								<h5>What are boards?</h5>
								<p>Collect your pins onto boards. Boards hold pins based on your own preferences, and you choose which board you want to add a pin to. Make one about dogs. That's always a good start.</p>
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
								<h5>I see, and how many boards can I make?</h5>
								<p>As much as you want. Set them to private or public, based on what you want people to see. Make a board entirely for one pin, or make one board for everything.</p>
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
								<h5>Fantastic, so how do I create a board?</h5>
								<p>After signing up with Corq and logging in, you can click your username in the navigation bar and blick "My Boards". Here, you can click on the large "plus" icon labeled "Create a Board". Fill out the form and hit submit.</p>
							</div>
		                </div>
					</div>
	            </div>
	        </div>		
		</div>
	</section>
 	<!-- /section: boards-->


	<!-- Section: about -->
    <a name="about"><section id="about" class="home-section text-center"></a>
		<div class="heading-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown" data-wow-delay="0.4s">
							<div class="section-heading">
								<h2>About Team Corq</h2>
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
								<h5>Ardalan</h5>
		                        <p class="subtitle">Developer</p>
		                        <div class="avatar"><img src="img/team/1.jpg" alt="" class="img-responsive img-circle" /></div>
		                    </div>
		                </div>
					</div>
	            </div>

				<div class="col-xs-6 col-sm-3 col-md-3">
					<div class="wow bounceInUp" data-wow-delay="0.5s">
		                <div class="team boxed-grey">
		                    <div class="inner">
								<h5>Malcolm</h5>
		                        <p class="subtitle">Scrum Master</p>
		                        <div class="avatar"><img src="img/team/2.jpg" alt="" class="img-responsive img-circle" /></div>
		                    </div>
		                </div>
					</div>
	            </div>

				<div class="col-xs-6 col-sm-3 col-md-3">
					<div class="wow bounceInUp" data-wow-delay="0.8s">
		                <div class="team boxed-grey">
		                    <div class="inner">
								<h5>John</h5>
		                        <p class="subtitle">Product Owner</p>
		                        <div class="avatar"><img src="img/team/3.jpg" alt="" class="img-responsive img-circle" /></div>
		                    </div>
		                </div>
					</div>
	            </div>

				<div class="col-xs-6 col-sm-3 col-md-3">
					<div class="wow bounceInUp" data-wow-delay="1s">
		                <div class="team boxed-grey">
		                    <div class="inner">
								<h5>Art</h5>
		                        <p class="subtitle">Head Architect</p>
		                        <div class="avatar"><img src="img/team/4.jpg" alt="" class="img-responsive img-circle" /></div>
		                    </div>
		                </div>
					</div>
	            </div>
	            <div class="col-xs-6 col-sm-3 col-md-3">
					<div class="wow bounceInUp" data-wow-delay="1s">
		                <div class="team boxed-grey">
		                    <div class="inner">
								<h5>Tom</h5>
		                        <p class="subtitle">DB specialist</p>
		                        <div class="avatar"><img src="img/team/5.jpg" alt="" class="img-responsive img-circle" /></div>
		                    </div>
		                </div>
					</div>
	            </div>
	            <div class="col-xs-6 col-sm-3 col-md-3">
					<div class="wow bounceInUp" data-wow-delay="1s">
		                <div class="team boxed-grey">
		                    <div class="inner">
								<h5>Kjetil</h5>
		                        <p class="subtitle">Developer</p>
		                        <div class="avatar"><img src="img/team/6.jpg" alt="" class="img-responsive img-circle" /></div>
		                    </div>
		                </div>
					</div>
	            </div>
	            <div class="col-xs-6 col-sm-3 col-md-3">
					<div class="wow bounceInUp" data-wow-delay="1s">
		                <div class="team boxed-grey">
		                    <div class="inner">
								<h5>Kristian</h5>
		                        <p class="subtitle">QA</p>
		                        <div class="avatar"><img src="img/team/7.jpg" alt="" class="img-responsive img-circle" /></div>
		                    </div>
		                </div>
					</div>
	            </div>
	            <div class="col-xs-6 col-sm-3 col-md-3">
					<div class="wow bounceInUp" data-wow-delay="1s">
		                <div class="team boxed-grey">
		                    <div class="inner">
								<h5>Kelly</h5>
		                        <p class="subtitle">QA</p>
		                        <div class="avatar"><img src="img/team/8.jpg" alt="" class="img-responsive img-circle" /></div>
		                    </div>
		                </div>
					</div>
	            </div>
	            <div class="col-xs-6 col-sm-3 col-md-3">
					<div class="wow bounceInUp" data-wow-delay="1s">
		                <div class="team boxed-grey">
		                    <div class="inner">
								<h5>Soelin</h5>
		                        <p class="subtitle">Developer</p>
		                        <div class="avatar"><img src="img/team/2.jpg" alt="" class="img-responsive img-rounded" /></div>
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