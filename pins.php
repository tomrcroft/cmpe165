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

        if ($password == $passwordverify) {
            addUser($username, $realname, $password);
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
    



        <div id="pin-container" class="masonry js-masonry"  data-masonry-options='{ "columnWidth": 310, "itemSelector": ".item", "isFitWidth": true }'>
            <!-- TODO: edit this script
            <?php
                // Fetches pins based on boards
                $boardIDs = getBoardByUser($user);
                $boardNames = getBoardNames($user);
                $boardPreviews = getBoardPreviews($user);

                for($i = 0; $i < count($boardIDs) - 1; $i++) {
                    echo '
                        <div class="item">
                            <img src="http://www.beyondhollywood.com/uploads/2014/05/Ben-Affleck-in-Batman-vs.-Superman-2016-Movie-Image1.jpg" />
                        </div>';
                }
            ?>

            Once this works, remove item classes listed directly below
            -->
            <div class="item"><img src="http://www.beyondhollywood.com/uploads/2014/05/Ben-Affleck-in-Batman-vs.-Superman-2016-Movie-Image1.jpg" /></div>
            <div class="item"><img src="http://collider.com/wp-content/uploads/batman-arkham-knight-1.jpg" /></div>
            <div class="item"><img src="http://static.comicvine.com/uploads/scale_small/6/66303/3332249-batman_the_animated_series_logo.jpg" />
                <p>blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah</p>
            </div>
            <div class="item"><img src="http://3.bp.blogspot.com/-0onXBUDbyRw/Uha54E5GLfI/AAAAAAAAlfM/X68u6TNTBaI/s1600/batman.jpg" /></div>
            <div class="item"><img src="http://static.comicvine.com/uploads/scale_small/6/66303/3332249-batman_the_animated_series_logo.jpg" /></div>
            <div class="item"><img src="http://collider.com/wp-content/uploads/batman-arkham-knight-1.jpg" /></div>
            <div class="item"><img src="http://static.comicvine.com/uploads/scale_small/6/66303/3332249-batman_the_animated_series_logo.jpg" /></div>
            <div class="item"><img src="http://www.beyondhollywood.com/uploads/2014/05/Ben-Affleck-in-Batman-vs.-Superman-2016-Movie-Image1.jpg" /></div>
            <div class="item"><img src="http://3.bp.blogspot.com/-0onXBUDbyRw/Uha54E5GLfI/AAAAAAAAlfM/X68u6TNTBaI/s1600/batman.jpg" /></div>
        </div>

    </section>


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