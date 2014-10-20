<?php 
    session_start(); 
    include 'actions.php';

    if (isset($_POST['submitCreateBoard'])) {
        $owner = $_SESSION['username'];
        $boardname = $_POST['boardname'];

        addBoard($owner, $boardname);
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
                        $user = $_SESSION['username'];
                        echo "<li><a href=\"#profile\">$user</a></li>
                            <li><a href='logout.php'>Logout</a></li>";
                    ?>
                    <li><a href="test.php">About</a></li>
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
                <a href="#loginRegister" data-toggle="modal" data-target="#myModal">
                    <div class="col-xs-6 col-sm-3 col-md-3">
                        <div class="wow bounceInUp" data-wow-delay="0.2s">
                            <div class="team boxed-grey">
                                <div class="inner">
                                    <h5>Create a New Board</h5>
                                    <div class="avatar">
                                        <img src="img/corqadd.png" alt="" class="img-responsive img-circle" /></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>


                <?php
                    // Fetches boards based on user
                    $boardIDs = getBoardByUser($user);
                    $boardNames = getBoardNames($user);
                    $boardPreviews = getBoardPreviews($user);

                    for($i = 0; $i < count($boardIDs) - 1; $i++) {
                        echo '
                            <a href="pins.php">
                                <div class="col-xs-6 col-sm-3 col-md-3">
                                    <div class="wow bounceInUp" data-wow-delay="0.2s">
                                        <div class="team boxed-grey">
                                            <div class="inner">
                                                <h5>'.$boardNames[$i].'</h5>
                                                <div class="avatar">
                                                    <img src="'.$boardPreviews[$i].'" alt="" 
                                                    class="img-responsive img-circle" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>';
                    }


                ?>
                
            </div>      
        </div>
    </section>



    <!-- Create New Board Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                <i class="icon-hand-right"></i> &nbsp Create</button>
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