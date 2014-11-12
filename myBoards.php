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
	if (!isset($_GET['username'])) {
		header("location:index.php");
	}
    if (isset($_GET['boardname'])) {
        $board_id = $_GET['boardname'];
        removeBoard($board_id);
		header("location:myBoards.php?username=gary");
    }
    if (isset($_POST['submitUploadPin'])) {
        $owner = $_SESSION['username'];
        $boardId = $_POST['boardId'];
        $title = $_POST['pinTitle'];
        $desc = $_POST['pinDescription'];
        $url = $_POST['pinUrl'];
 
        addPin($owner, $boardId, $title, $desc, $url);	
    }

    if (isset($_POST['submitFollow'])) {
        $user = $_SESSION['username'];
        $following = $_GET['username'];

        follow($user, $following);
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
    <script>
      function removeboard(eventboard)
        {
            if(confirm("Do you want to delete the board?"))
            {   
                window.location = "myBoards.php?boardname="+eventboard;
            }
            
        }
    </script>

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
		$boardOwner = $_GET['username'];
		if ($_GET['username'] == $_SESSION['username']) {
			$isOwner = true;
		} else {
			$isOwner = false;
		}
	?>

    <section id="about" class="home-section text-center">
        <div class="heading-about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wow bounceInDown" data-wow-delay="0.4s">
                            <div class="section-heading">
                                <!-- TODO: insert board owner's name -->
                                <h2><?php echo $boardOwner; ?></h2>
                                <!-- Info Badges -->
								
                                <div class="heading-about">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-8 col-lg-offset-2">
                                                <?php
                                                    $boardIDs = getBoardByUser($boardOwner); //TODO: insert board owner's name
                                                    $numberOfBoards = count($boardIDs);
													$numberOfPins =  getNumberOfPins($boardOwner);
                                                ?>
                                                <ul class="nav nav-pills center">
                                                    <li class="active" style="padding-left:3em">
                                                        <!-- TODO: count all pins on all boards -->
                                                        Pins<span class="badge pull-right"><?php echo $numberOfPins; ?></span>
                                                    </li>
                                                    <li class="active" style="padding-left:3em">
                                                        Boards<span class="badge pull-right"> <?php echo $numberOfBoards; ?></span>
                                                    </li>
                                                    <?php
                                                        if (isset($_SESSION["username"]) && session_status() == PHP_SESSION_ACTIVE && $_SESSION["username"] && $isOwner){
                                                            echo '<li class="active" style="padding-left:3em; margin-top:-5px">
                                                                <button href="#editProfile" class="btn btn-primary btn-sm">Account Settings</button>
                                                            </li>';
                                                        } elseif (isset($_SESSION["username"]) && session_status() == PHP_SESSION_ACTIVE && $_SESSION["username"] && !$isOwner){ //TODO: change to "else if" condition to check if user is following this person already, then uncomment "else" statement below
                                                            echo '<li class="active" style="padding-left:3em; margin-top:-5px">
                                                                <form method="POST">
                                                                <button type="submit" name="submitFollow" class="btn btn-primary btn-sm">Follow</button>
                                                                </form>
                                                            </li>';
                                                        } else {
                                                            echo '<li class="active" style="padding-left:3em; margin-top:-5px">
                                                                <button type="submit" class="btn btn-primary btn-sm">Unfollow</button>
                                                            </li>';
                                                        }
                                                    ?>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Info Badges -->
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
            
            <!-- Show a "create board"-button if $user = $_SESSION['username'] -->
                <?php
                    if ($isOwner == true){
                        echo '<div class="col-xs-6 col-sm-3 col-md-3">
                            <div class="wow bounceInUp" data-wow-delay="0.2s">
                                <a href="#createBoard" data-toggle="modal" data-target="#createBoard">
                                    <div class="team boxed-grey">
                                        <div class="inner">
                                            <div style="margin-top:-15px">
                                                <h5>Create a New Board</h5>
                                            </div>
                                            <div class="avatar">
                                                <img src="img/corqadd.png" alt="" class="img-responsive img-circle" /></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>';
                    }
                ?>


                <?php
                    // Fetches boards based on user
                    $boardIDs = getBoardByUser($boardOwner);
                    $boardNames = getBoardNames($boardOwner);
                    for($i = 0; $i < count($boardIDs); $i++) {
                        $boardPreview = getBoardPreview($boardIDs[$i]);
                        if (!(isset($boardPreview))) {
                            $boardPreview = "img/pins/preview.jpg";
                        }
                        echo '
                            <div class="col-xs-6 col-sm-3 col-md-3">
                                <div class="wow bounceInUp" data-wow-delay="0.2s">
                                    <a href="boards.php?board='.$boardIDs[$i].'">
                                        <div class="team boxed-grey">
                                            <div class="inner">
                                                <div style="margin-top:-15px">
                                                    <h5>'.$boardNames[$i].'</h5>
                                                </div>
                                                <div class="circle-image" style="background-image:url(\''.$boardPreview.'\');"></div>
                                            </div>
                                        </div>
                                    </a>';
									if ($isOwner == true) {
										echo '
                                			<!-- Delete this board from database-->
                                			<button id="btn-deleteBoard"  name="submitDeleteButton" type="submit"
                                    			class="btn btn btn-sm btn-secondary edit-board" onclick="removeboard('.$boardIDs[$i].')">
                                			<i class="icon-hand-left"></i>delete</button>';
									}
								echo '
                            </div>
                        </div>';
                    }
                ?>
                
            </div>      
        </div>
    </section>



    <!-- Get login/register modal. -->
    <?php include 'loginmodal.php' ?>
    <!-- Get upload pin modal. -->
    <?php include 'pinmodal.php' ?>
        <!-- Get create board modal. -->
    <?php include 'createboardmodal.php' ?>

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