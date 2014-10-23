<?php 
    session_start(); 
    include 'actions.php';

    // If user is not logged in, redirect it
    if (!(isset($_SESSION['username']))) {
        header("location:index.php"); //to redirect back to "index.php" after logging out
        exit();
    }

    if (isset($_POST['submitCreateBoard'])) {
        $owner = $_SESSION['username'];
        $boardname = $_POST['boardname'];

        addBoard($owner, $boardname);
    }

    if (isset($_POST['submitDeleteBoard'])) {
        $board_id = $_POST['board_id'];
        removeboard($board_id);
    }
	$viewUser = "gary";
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

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <!-- Preloader -->
    <div id="preloader">
        <div id="load"></div>
    </div>

    <!-- Get nav bar -->
    <?php include 'navbar.php' ?>

    <section id="top" class="top">
    </section>

    <section id="about" class="home-section text-center">
        <div class="heading-about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wow bounceInDown" data-wow-delay="0.4s">
                            <div class="section-heading">
                                <h2><?php echo $viewUser."'s"; ?> Boards</h2>
                                <i class="fa fa-2x fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<!-- Info Badges -->
		<br>
		<br>
		<?php
			$boardIDs = getBoardByUser($viewUser);
			$numberOfBoards = count($boardIDs);
		?>
		<ul class="nav nav-pills pull-right">
			<li class="active">
				<a href="#">
		        	Pins<span class="badge pull-right">98</span>
		    	</a>
			</li>
			<li class="active">
		    	<a href="#">
		      		Boards<span class="badge pull-right"> <?php echo $numberOfBoards; ?></span>
		    	</a>
			</li>
			<!--
			<li class="active">
		    	<a href="#">
		      		Followers<span class="badge pull-right">42</span>
		    	</a>
		    </li>
			-->
		  </ul>
		  <!-- /Info Badges -->
		  
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-lg-offset-5">
                    <hr class="marginbot-50">
                </div>
            </div>

            <div class="row">
                
                <?php
                    // Fetches boards based on user
                    $boardNames = getBoardNames($viewUser);
                    $boardPreviews = getBoardPreviews($viewUser);

                    for($i = 0; $i < count($boardIDs); $i++) {
                        if (!(isset($boardPreviews[$i]))) {
                            $boardPreviews[$i] = "img/pins/preview.jpg";
                        }

                        echo '
                            <div class="col-xs-6 col-sm-3 col-md-3">
                                <div class="wow bounceInUp" data-wow-delay="0.2s">
                                    <a href="pins.php?board='.$boardIDs[$i].'">
                                        <div class="team boxed-grey">
                                            <div class="inner">
                                                <h5>'.$boardNames[$i].'</h5>
                                                <div class="avatar">
                                                    <img src="'.$boardPreviews[$i].'" alt="" 
                                                    class="img-responsive img-circle" />
                                                </div>                                               
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>';
                    }


                ?>
                
            </div>      
        </div>
    </section>

    <!-- Get login/register modal. -->
    <?php include 'loginmodal.php' ?>

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