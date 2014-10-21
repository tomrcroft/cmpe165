<?php 
    session_start(); 
    include 'actions.php';

    // If user is not logged in, redirect it
    if (!(isset($_SESSION['username']))) {
        header("location:index.php"); //to redirect back to "index.php" after logging out
        exit();
    }

    if (isset($_POST['submitUploadPin'])) {
        // Action to submit new pin.
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

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php"><h1><font color="black">Corq</font></h1></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">

                    <?php
                        if (isset($_SESSION["username"]) && session_status() == PHP_SESSION_ACTIVE && $_SESSION["username"]){
                            $user = $_SESSION['username'];
                            echo "<li><a href=\"#profile\">$user</a></li>
                                <li><a href='logout.php'>Logout</a></li>";
                        } else {
                            echo "<li><a href=\"#loginRegister\" data-toggle=\"modal\" data-target=\"#myModal\">Login/Register</a></li>";
                        }
                    ?>
                    <li><a href="#uploadPin" data-toggle="modal" data-target="#uploadPin">Pin It</a></li>
                    <li><a href="help.php">Help</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Boards<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="myBoards.php">My Boards</a></li>
                            <li><a href="searchBoards.php">Search Boards</a></li>
                            <li><a href="#">I'm feeling lucky</a></li>
                        </ul>
                    </li>
                </ul>
            </div> <!-- /.navbar-collapse -->
        </div> <!-- /.container -->
    </nav>

    <section id="top" class="top">
    </section>

    <section id="contact" class="home-section text-center">
        <div class="heading-contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wow bounceInDown" data-wow-delay="0.4s">
                            <div class="section-heading">
                                <h2>/fetch board name here/</h2>
                                <i class="fa fa-2x fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Show all pins based on board ID -->
        <div id="pin-container" class="masonry js-masonry"  data-masonry-options='{ "columnWidth": 310, "itemSelector": ".item", "isFitWidth": true }'>
            <?php
                
                // Where to get board ID from? 
                $pins = getPinLinks(1);

                for($i = 0; $i < count($pins); $i++) {

                    echo '
                        <a href="#viewPin" data-toggle="modal" data-target="#viewPin">
                            <div class="item">
                                <img src="'.$pins[$i].'" />
                            </div>
                        </a>';
                }
            ?>
        </div>

    </section>


    <!-- Upload Pin Modal -->
    <div class="modal fade" id="uploadPin" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="pinit" style="margin-top:50px;" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info" >
                        <div class="panel-heading">
                            <div class="panel-title">Pin It</div>
                        </div>
                        <div class="panel-body" >
                            <form id="uploadPinform" class="form-horizontal" name="pinit" action="myBoards.php" method="POST">
                                <div class="form-group">
                                    <div class="col-md-9">
                                        <!-- Upload Pin Field -->
                                        <div class="form-group">
                                            <label for="uploadPin" class="col-md-3 control-label">Image</label>
                                            <div class="col-md-20">
                                                <input type="uploadPin" class="form-control" name="uploadPin" placeholder="Paste a URL ending in .JPG, .PNG, or .GIF">
                                            </div>
                                            <div class="col-md-20">
                                                <label for="boardname" class="col-md-3 control-label">Board</label>
                                                <select id="boardname" name="boardname" class="form-control" required="required">
                                                    <option value="na" selected="">Choose One:</option>

                                                    <?php

                                                        $list = getBoardByUser($_SESSION['username']);
                                                        $names = getBoardNames($_SESSION['username']);

                                                        for($i = 0; $i < count($names); $i++) {
                                                            echo '<option value="'.$list[$i].'">'.$names[$i].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <button id="btn-uploadPin" name="submitUploadPin" type="submit" type="button" class="btn btn-info"><i class="icon-hand-right"></i>Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>        
                    </div>
                </div> 
            </div>
        </div>    
    </div>


    <!-- View Pin modal -->
    <div class="modal fade" id="viewPin" tabindex="-3" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="panel panel-info" >
                    <div class="panel-body" >


                        <div class="form-group">
                            <div class="col-md-9">
                                <!-- TODO: script to show clicked image here. Remove line below after this is solved -->
                                <img src="img/pins/tumblr_n8cwonFIBH1tbe79ko1_1280.jpg" />
                            </div>
                        </div>

                        <form id="commentform" class="form-horizontal" name="commentform" action="" method="POST">
                            <div class="form-group">
                                <div class="col-md-9">
                                    <!-- Upload Pin Field -->
                                    <div class="form-group">
                                        <label for="uploadPin" class="col-md-3 control-label">Leave a comment</label>
                                        <div class="col-md-20">
                                            <input type="comment" class="form-control" name="comment" placeholder="Say something">
                                        </div>
                                        <!-- TODO: fetch and list comments -->
                                    </div>
                                    <button id="btn-commentSend" name="submitCommentSend" type="submit" type="button" class="btn btn-info"><i class="icon-hand-right"></i>Send</button>
                                </div>
                            </div>
                        </form>


                    </div>        
                </div>
            </div>
        </div>
    </div>

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