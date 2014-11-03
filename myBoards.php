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

    if (isset($_GET['boardname'])) {
        $board_id = $_GET['boardname'];
        removeBoard($board_id);
		header("location:myBoards.php");
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



    <section id="about" class="home-section text-center">
        <div class="heading-about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wow bounceInDown" data-wow-delay="0.4s">
                            <div class="section-heading">
                                <h2>My Boards</h2>
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
            
                <!-- Show a "create board"-button if $user = $_SESSION['username'] -->
                <div class="col-xs-6 col-sm-3 col-md-3">
                    <div class="wow bounceInUp" data-wow-delay="0.2s">
                        <a href="#createBoard" data-toggle="modal" data-target="#createBoard">
                            <div class="team boxed-grey">
                                <div class="inner">
                                    <h5>Create a New Board</h5>
                                    <div class="avatar">
                                        <img src="img/corqadd.png" alt="" class="img-responsive img-circle" /></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                


                <?php
                    // Fetches boards based on user
                    $boardIDs = getBoardByUser($user);
                    $boardNames = getBoardNames($user);

                    for($i = 0; $i < count($boardIDs); $i++) {

                        $boardPreview = getBoardPreview($boardIDs[$i]);
                        if (!(isset($boardPreview))) {
                            $boardPreview = "img/pins/preview.jpg";
                        }

                        echo '
                            <div class="col-xs-6 col-sm-3 col-md-3">
                                <div class="wow bounceInUp" data-wow-delay="0.2s">
                                    <a href="pins.php?board='.$boardIDs[$i].'">
                                        <div class="team boxed-grey">
                                            <div class="inner">
                                                <h5>'.$boardNames[$i].'</h5>
                                                <div class="avatar">
                                                    <img src="'.$boardPreview.'" alt="" 
                                                    class="img-responsive img-circle" />
                                                </div>
                        
                                            </div>
                                        </div>
                                    </a>
                                <!-- Php code needed to delete this board from database-->
                                <div class="col-md-offset-8 col-md-4">
                        
                                        <button id="btn-deleteBoard"  name="submitDeleteButton" type="submit"
                                        class="btn btn-info" onclick="removeboard('.$boardIDs[$i].')">
                                        <i class="icon-hand-right"></i>X</button>
                        
                                </div>
                            </div>
                        </div>';
                    }


                ?>
                
            </div>      
        </div>
    </section>



    <!-- Create New Board Modal -->
    <div class="modal fade" id="createBoard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">                    
                    <div class="panel panel-info" >

                        <div class="panel-heading">
                            <div class="panel-title">Create a New Board</div>
                        </div>     

                        <div style="padding-top:30px" class="panel-body" >
                            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                                <form id="signupform" class="form-horizontal" name="signin" action="myBoards.php" method="POST">
                                
                                    <div id="signupalert" style="display:none" class="alert alert-danger">
                                        <p>Error:</p>
                                        <span></span>
                                    </div>
                                    
                                    <!-- Board Name Field -->
                                    <div class="form-group">
                                        <label for="boardname" class="col-md-3 control-label">Board Name</label>
                                        <div class="col-md-9">
                                            <input type="boardname" class="form-control" name="boardname" placeholder="Title your new board">
                                        </div>
                                    </div>

                                    <!-- Description
                                    <div class="form-group">
                                        <label for="description" class="col-md-3 control-label">Description</label>
                                        <div class="col-md-9">
                                            <input type="description" class="form-control" name="description" placeholder="Tell everyone what's on your board">
                                        </div>
                                    </div>

                                    <!-- Category
                                    <div class="form-group">
                                        <label for="category" class="col-md-3 control-label">Category</label>
                                        <div class="col-md-9">
                                            <input type="category" class="form-control" name="category" placeholder="Where should we file your board">
                                        </div>
                                    </div>

                                    <!-- Private board switch
                                    <div class="form-group">
                                        <label for="passverify" class="col-md-3 control-label">Password Verification</label>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" name="passverify" placeholder="Password Verification">
                                        </div>
                                    </div>
                                    -->
                                    <!-- Create Board Button -->    
                                    <div class="form-group">                      
                                        <div class="col-md-offset-3 col-md-9">
                                            <button id="btn-createBoard" name="submitCreateBoard" type="submit" type="button" class="btn btn-info">
                                                <i class="icon-hand-right"></i>Create</button>
                                            <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- Close Login Alert -->                   
                        </div> <!-- Close Panel Body -->   
                    </div> <!-- Close panel info -->
                </div> <!-- Close Login Box -->
            </div> <!-- Close Modal Content -->
        </div> <!-- Close Modal Dialog -->
    </div> <!-- Close Modal Fade -->

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