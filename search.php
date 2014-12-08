<?php 
    session_start(); 
    include 'actions.php';
    // If user is not logged in, redirect it
    if (!(isset($_SESSION['username']))) {
        header("location:index.php"); //to redirect back to "index.php" after logging out
        exit();
    }
				
	if (isset($_POST['username'])) {
		header("location: myBoards.php?username=".$_POST['username']); 
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

	<?php
		$searchTerm = $_GET['search'];
		$userHits = searchForUsername($searchTerm);
		$pinHits = searchForPin($searchTerm);
		$boardHits;
	?>
	<section id="searchHits" class="home-section text-center">
		<?php
			echo '<h2>Users</h2>';
			if(count($userHits) > 0) {	
				//max 20
				$j = 20;
				if (count($userHits) < 20) {
					$j = count($userHits);
				}			
				for ($i = 0; $i < $j; $i++) {
					echo '<a href="myBoards.php?username='.$userHits[$i].'">'.$userHits[$i].'</a>';
					echo'<br>';
				}
			} else {
				echo "<p>I'm sorry, no matching users found</p>";
			}
			//TODO get hits based on board categories
			echo'<br>';
			echo '<h2>Boards</h2>';
			if (false) {
				echo '';
			} else {
				echo "<p>I'm sorry, no matching boards found</p>";
			}
			//TODO get hits based on pins
			echo'<br>';
			echo '<h2>Pins</h2>';
			if (count($pinHits) > 0) {
				echo '<button type="button" class="btn btn-secondary btn-sm likeButton" onclick="searchPins.php?term='.$searchTerm.';">View Matching Pins</button>';
			} else {
				echo "<p>I'm sorry, no matching pins found</p>";
			}
		?>
    	
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