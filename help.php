<?php 
    session_start(); 
    include 'actions.php';
	
    if (!(isset($_SESSION['username']))) {
        header("location:index.php"); //to redirect back to "index.php" after logging out
        exit();
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

	    <!-- Get modals and nav bar -->
	    <?php include 'navbar.php' ?>
            <?php include 'pinitmodal.php' ?>
            <?php include 'pinmodal.php' ?>
	    <section id="top" class="top">
	    </section>
    

    <section id="top" class="top">
    </section>

    
	<!-- Section: intro -->
    <section id="intro" class="intro">
	
		<div class="slogan">
			<h2>Corq</span> </h2>
			<h4>Find things you like and share it</h4>
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
				<!--
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInRight" data-wow-delay="0.2s">
		                <div class="service-box">
							<div class="service-icon">
								<img src="img/icons/service-icon-4.png" alt="" />
							</div>
							<div class="service-desc">
								<a href="#video"><h5>Tutorial Videos</h5></a>
								<p>         </p>
							</div>
		                </div>
					</div>
	            </div>
	           	 -->
	        </div>		
		</div>
	</section>
	<!-- /Section: services -->

	<!-- section: pins-->

	<a name="pins"><section id="service" class="home-section text-center bg-gray" style= "background-color:rgb(103, 176, 209)"></a>
		
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
								<p>Pins are visual bookmarks. Each Pin you see on Corq links back to the site it came from, so you can learn more—like how to make it or where to buy it. 
 </p>
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
								<h5>How can you pin?</h5> 
								<p>It is simple. Next to each picture that you find on our site, there is REPIN button that you can click. After clicking, you need to choose the board that you are pinning to.</p>
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
								<h5>What can you pin?</h5>
								<p>Basically, you can pin any images. You can pin visuals from different websites or from other users' pins. </p>
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
								<h5>How to find pins?</h5>
								<p>Collect things you find around the web, or look through Pins already on Corq to see what other people have found. </p>
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
								<p> Boards are the places to hold pins. Basically everytime that you pin something, it asks you for a specific place to pin it which is a specific board.</p>
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
								<h5>How many types of boards are there?</h5>
								<p>There are two types of boards. One is private and another one is public. The names say everything about them. Private boaard is your own private place for pinning whatever you want. A public board is visible to everyone.</p>
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
								<h5>How can you create a board?</h5>
								<p> You can create a board whenever you desire from the MY BOARDS screen. Once you try to pin something, it will ask you which board you want to pin it to, then you can choose a board.</p>
							</div>
		                </div>
					</div>
	            </div>
				<!--
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInRight" data-wow-delay="0.2s">
		                <div class="service-box">
							<div class="service-icon">
								<img src="img/icons/service-icon-4.png" alt="" />
							</div>
							<div class="service-desc">
								<h5>??</h5>
								<p>	</p>
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
								<h5>??</h5>
								<p>	</p>
							</div>
		                </div>
					</div>
	            </div>-->
	        </div>		
		</div>
	</section>

 	<!-- /section: boards-->

 	<!-- section: profile-->


<a name="profile"> <section id="service" class="home-section text-center bg-gray" style= "background-color:rgb(103, 176, 209)"></a>
		
		<div class="heading-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown" data-wow-delay="0.4s">
							<div class="section-heading">
								<a name="boards"><h2>Profile</h2></a>
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
								<h5>What can you do in your profile?</h5>
								<p> You can view your boards and pins. You can edit them. </p>
							</div>
		                </div>
					</div>
	            </div>
				<!--
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
		                <div class="service-box">
							<div class="service-icon">
								<img src="img/icons/service-icon-2.png" alt="" />
							</div>
							<div class="service-desc">
								<a href="#boardes"><h5>??</h5> </a>
								<p> </p>
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
								<h5>??</h5>
								<p> </p>
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
								<h5>??</h5>
								<p>	</p>
							</div>
		                </div>
					</div>
	            </div>
	           	-->	


	        </div>		
		</div>
	</section>




 	<!-- /section:profile-->






	<!-- section: videos
	<a name="video"><section id="service" class="home-section text-center bg-gray" style= " background-color:#00FF66"></a>
		
		<div class="heading-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown" data-wow-delay="0.4s">
							<div class="section-heading">
								<h2>Tutorial Videos</h2>
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
								<img src="img/icons/service-icon-3.png" alt="" />
							</div>
							<div class="service-desc">
								<h5>Video 1</h5>
								<p> </p>
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
								<h5>Video 2</h5> 
								<p> </p>
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
								<h5>Video 3</h5>
								<p> </p>
							</div>
		                </div>
					</div>
	            </div>

				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInRight" data-wow-delay="0.2s">
		                <div class="service-box">
							<div class="service-icon">
								<img src="img/icons/service-icon-3.png" alt="" />
							</div>
							<div class="service-desc">
								<h5>Video 4</h5>
								<p> </p>
							</div>
		                </div>
					</div>
	            </div>
	           
	        </div>		
		</div>
	</section>
	<!-- /section: videos-->



	<!-- Section: about 
    <a name="about"><section id="about" class="home-section text-center"></a>
		<div class="heading-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown" data-wow-delay="0.4s">
							<div class="section-heading">
								<h2>Who we are?</h2>
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
		                        <div class="avatar"><img src="img/team/9.jpg" alt="" class="img-responsive img-circle" /></div>
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
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/masonry.pkgd.js"></script>

</body>

</html>
