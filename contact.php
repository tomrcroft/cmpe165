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
 
     
    <!-- Section: contact -->
    <section id="contact" class="home-section text-center">
 
        <div class="heading-contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wow bounceInDown" data-wow-delay="0.4s">
                            <div class="section-heading">
                                <h2>Get in touch</h2>
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
                <div class="col-lg-8">
                    <div class="boxed-grey">
                        <form id="contact-form">
                            <div class="row">
                                <div class="col-md-6">
 
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                                    </div>
 
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" />
                                        </div>
                                    </div>
 
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <select id="subject" name="subject" class="form-control" required="required">
                                            <option value="na" selected="">Choose One:</option>
                                            <option value="service">General Customer Service</option>
                                            <option value="suggestions">Suggestions</option>
                                            <option value="product">Product Support</option>
                                        </select>
                                    </div>
                                </div>
 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Message</label>
                                        <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                            placeholder="Message"></textarea>
                                    </div>
                                </div>
 
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-skin pull-right" id="btnContactUs">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
             
                <div class="col-lg-4">
                    <div class="widget-contact">
                        <h5>Main Office</h5>
                        <address>
                            <strong>Squas Design, Inc.</strong><br>
                            Tower 795 Folsom Ave, Beautiful Suite 600<br>
                            San Francisco, CA 94107<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>
 
                        <address>
                            <strong>Email</strong><br>
                            <a href="mailto:#">email.name@example.com</a>
                        </address>  
 
                        <address>
                            <strong>We're on social networks</strong><br>
                            <ul class="company-social">
                                <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li class="social-twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li class="social-dribble"><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                <li class="social-google"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            </ul>   
                        </address>                  
                    </div>  
                </div>
            </div>  
        </div>
    </section>
    <!-- /Section: contact -->
 
 
 
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