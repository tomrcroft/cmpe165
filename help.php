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
    <section id="service" class="home-section text-center bg-gray" style= " background-color:#FFFFCC">
		
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
	           
	        </div>		
		</div>
	</section>
	<!-- /Section: services -->

	<!-- section: pins-->

	<a name="pins"><section id="service" class="home-section text-center bg-gray" style= " background-color:#CCFF33"></a>
		
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
								<p>Pins are visual bookmarks. Each Pin you see on Pinterest links back to the site it came from, so you can learn more—like how to make it or where to buy it. 
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
								<p>It is simple. Next to each picture that you find on our site, there is PIN button that you can click. After clicking, you need to choose the board that you are pinning to.</p>
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
								<p>Basically, you can pin anything and everything. You can pin something from your device like laptop or phone. Also you can pin visuals from different websites or from other users' pins. </p>
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
								<p>Collect things you find around the web, or look through Pins already on Pinterest to see what other people have found. </p>
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
								<h5>Adventure</h5>
								<p>Vestibulum tincidunt enim in pharetra malesuada. Duis semper magna metus electram accommodare.</p>
							</div>
		                </div>
					</div>
	            </div>
	        </div>		
		</div>
	</section>




 	<!-- /section: pins-->
	




 	<!-- section: boards-->
 	<a name="boards"><section id="service" class="home-section text-center bg-gray" style= " background-color:#ff6699"></a>
		
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
								<p> Boards are the pin holder places. Basically everytime that you pin something, it asks you for specific place to pin it which is a specific board.</p>
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
								<a href="#boardes"><h5>How many types of boards are there?</h5> </a>
								<p>There are two types of boards. One is private and another one is public. The names say everything about them. Private boaard is your own private place for pinning whatever you want. On the ither hand public board is visible to everyone.</p>
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
								<p> You can create a board whenever you desire. Once you try to pin something, it will ask you which board you want to pin it to, then you can choose or create a board. Also, prior to pinning anything you can create new boards.</p>
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
	        </div>		
		</div>
	</section>

 	<!-- /section: boards-->

 	<!-- section: profile-->


<a name="profile"> <section id="service" class="home-section text-center bg-gray" style=" background-color: #0099FF"></a>
		
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
	           			


	        </div>		
		</div>
	</section>




 	<!-- /section:profile-->






	<!-- section: videos-->
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



	<!-- Section: about -->
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
		                        <div class="avatar"><img src="img/team/2.jpg" alt="" class="img-responsive img-rounded" /></div>
		                    </div>
		                </div>
					</div>
	            </div>
	        </div>		
		</div>
	</section>
	<!-- /Section: about -->


<!-- Login/Register Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	    	<div class="modal-content">
	        	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">                    
	            	<div class="panel panel-info" >

	                    <div class="panel-heading">
	                        <div class="panel-title">Login</div>
	                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot your password?</a></div>
	                    </div>     

	                    <div style="padding-top:30px" class="panel-body" >
	                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
	                        	<form id="loginform" class="form-horizontal" role="form" action="index.php" method="POST">
	                                    
	                            	<div style="margin-bottom: 25px" class="input-group">
	                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	                                    <input required="" id="username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
	                                </div>
	                                
	                            	<div style="margin-bottom: 25px" class="input-group">
	                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	                                        <input required="" id="password" type="password" class="form-control" name="password" placeholder="password">
	                                </div>
	                                    

	                                
	                            	<div class="input-group">
	                                    <div class="checkbox">
	                                        <label>
	                                        	<input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
	                                        </label>
	                                    </div>
	                                </div>

	                                <!-- Button -->
	                                <div style="margin-top:10px" class="form-group">
	                                    <div class="col-sm-12 controls">

	                                    	<!-- Maybe I'll need to change to input type -->
	                                    	<button type="submit" id="signin" name="submitLogin" class="btn btn-success">Login</button>
	                                    	<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>
	                                    </div>
	                                </div>

	                                <!-- Register Here footer -->
	                                <div class="form-group">
	                                    <div class="col-md-12 control">
	                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" > Don't have an account? 
	                                        	<a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()"> Register Here</a>
	                                        </div>
	                                    </div>
	                                </div>   

	                            </form>
	                        </div> <!-- Close Login Alert -->                   
	                    </div> <!-- Close Panel Body -->   
	        		</div> <!-- Close panel info -->
	        	</div> <!-- Close Login Box -->

        		<div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">

                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px">
                            	<a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Or Login Here</a></div>
                        </div>

                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" name="signin" action="index.php" method="POST">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                
                                <!-- Email Field  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                 -->
                                
                                <!-- Username Field -->
                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">Username</label>
                                    <div class="col-md-9">
                                        <input type="username" class="form-control" name="username" placeholder="Username">
                                    </div>
                                </div>

                                <!-- Name Field -->
                                <div class="form-group">
                                    <label for="realname" class="col-md-3 control-label">First and Last Name</label>
                                    <div class="col-md-9">
                                        <input type="realname" class="form-control" name="realname" placeholder="First and Last Name">
                                    </div>
                                </div>

                                <!-- Password Field --> 
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>

                                <!-- Password Verify Field --> 
                                <div class="form-group">
                                    <label for="passverify" class="col-md-3 control-label">Password Verification</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="passverify" placeholder="Password Verification">
                                    </div>
                                </div>

								<!-- Register Button -->    
                                <div class="form-group">                      
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" name="submitRegister" type="submit" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Register</button>
                                        <span style="margin-left:8px;">or</span>
                                    </div>
                                </div>
                                
                                <!-- Facebook button -->
                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                                    </div>                                           
                                </div>

                        	</form>
                        </div> <!-- Close panel body -->
                    </div> <!-- Close panel info -->
        		</div> <!-- Close Sign Up Box -->
	    	</div> <!-- Close Modal Content -->
		</div> <!-- Close Modal Dialog -->
	</div> <!-- Close Modal Fade -->


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
