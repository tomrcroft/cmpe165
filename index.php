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
		if (checkUserName($_POST['username']) == 0) {
			echo "Username taken.";
		} else {
			$realname = $_POST['realname'];
			$username = $_POST['username'];
			$password= $_POST['password'];
			$passwordverify = $_POST['passverify'];
            $question = $_POST['question'];
            $answer = $_POST['answer'];
			$email = $_POST['email'];
                
			if ($password == $passwordverify) {
		    	addUser($username, $realname, $password, $question, $answer,$email);
            	$_SESSION['username'] = $username;
			} else {
		    	echo "Passwords did not match.";
			}
		}
	}    
	if (isset($_GET['verify'])) {
		$verifyCode = $_GET['verify'];
		$username = $_GET['username'];
		if (confirmuser($username, $verifyCode) == 1) {
			$_SESSION['username'] = $username;
		}
	} 
	if (isset($_POST['submitConfirmBtn'])) {
		$username = $_SESSION['resetUsername'];
		if (validateSecurityAnswer($_POST['useranswer'], $username)) {			
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $tempPassword = '';

		    for ($i = 0; $i < 12; $i++) {
		        $tempPassword .= $characters[mt_rand(0, strlen($characters) - 1)];
		    }
				
			setTempPassword($username, $tempPassword);			
			sendPasswordResetMail($username, $tempPassword);
		} else {
			echo "Your answer to your security question is wrong.";
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

	<!-- This NEEDS to be here, JQuery needs to be defined before it can be used -->
	<script src="js/jquery.min.js"></script>
	<script src="http://imagesloaded.desandro.com/imagesloaded.pkgd.min.js"></script>
	<!-- This is called when a pin is clicked, passes image link and pin title-->
	<script type="text/javascript">
	var $container = $('#pin-container');
	// initialize Masonry after all images have loaded  
	$container.imagesLoaded( function() {
  	  $container.masonry();
	});
	$(document).on("click", ".open-viewPin", function () {
		 $("#mapbox").hide(); 
		 $("#repinBox").hide();
		 $('#editPinform').hide()
		 $(".pinbox").show();
		 
		 var src = $(this).data('link');
		 var title = $(this).data('title');
		 var isRestaurant = $(this).attr('data-isRestaurant');
		 var pinID = $(this).attr('data-getPinID');
		 var comments = $(this).data('comments').split("~");
		 var commentAuthors = $(this).attr('data-commentAuthors').split("~");
		 var desription = $(this).attr('data-pinDescription');
		 
		 			 

		 $(".oldPinName").val(title);
		 $(".newPinName").val(title);
		 $(".pinDescription").val(desription);
		 $(".repinID").val(pinID);
		 $(".commentPinID").val(pinID);
		 var commentHtml="<br />";
		 $(".repinButton").show();
		 for (i = 0; i < comments.length; i++) {
			 if (commentAuthors[i] == '') {
				 commentHtml = '<br /><br />Be the first!';
				 break;
			 }
		 	commentHtml += commentAuthors[i] + ' says "' + comments[i] + '"<br /> <br />';
		 }
		     //We add vPool HTML content to #myDIV
		     $('.commentField').html(commentHtml);
	
			$(".open-editPin").hide();
			$(".addmaplink").hide();
			$(".likeButton").hide();
		 if (isRestaurant == 1) {		 	
				$(".viewmapBtn").show();			 			
			var address = $(this).attr('data-address');
			var addressLink = "mapview.php?address=" + address;
			$(".viewmapBtn").attr("href", addressLink);
		 } else {
			$(".viewmapBtn").hide();
		 }
		 
		 // passes the correct image link to viewpinmodal
	     $(".showPic").attr("src", src);
		 // passes the pin title and a close button to viewpinmodal
		 $(".title").html(title + '<button class="close" data-dismiss="modal" onclick="$("#viewPin").hide()">x</button>');
	});
</script>
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
    
	<!-- Section: intro -->
    <section id="intro" class="intro">
	
		<div class="slogan">
			<h2>Corq</span> </h2>
			<h4>feed me</h4>
		</div>
		<div class="page-scroll">
			<a href="#feed" class="btn btn-circle">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
		</div>
    </section>
	<!-- /Section: intro -->
	
 	<section id="feed" class="home-section text-center">
        <div class="heading-contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wow bounceInDown" data-wow-delay="0.4s">
                            <div class="section-heading">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- Show all pins based on board ID -->
	    
	<?php 
	//initialize feed board
	$board_id;
	if (!isset($_SESSION['username'])) {
		$board_id = getBoardID('admin', 'guest');
		if (checkBoardExists('admin', 'guest') == 0) {
			addBoard('admin', 'guest');
		} else {
			removeBoard($board_id);
			addBoard('admin', 'guest');
			$board_id = getBoardID('admin', 'guest');
		}		
		$pins = getNewPins();
		for ($i = 0; $i < 20; $i++) {
			repin($pins[$i], $board_id);
		}
	} else {
		$boardName = $_SESSION['username']."followBoard";
		$board_id = getBoardID('admin', $boardName);
		if (checkBoardExists('admin', $boardName) == 0) {
			addBoard('admin', $boardName);
		} else {
			removeBoard($board_id);
			addBoard('admin', $boardName);
		}
			$board_id = getBoardID('admin', $boardName);
			$pinHits = getFollowPins($_SESSION['username']);
			$pins = getNewPins();
			$max = 20;
			if (count($pinHits) < 20) {
				$max = count($pinHits);
			}
			for ($i = 0; $i < $max; $i++) {
				repin($pinHits[$i], $board_id);
			}
			for ($i = $max, $j = 0; $i < 20; $i++, $j++) {
				$foundNewPin = 0;
				while ($foundNewPin == 0) {
					if (in_array($pins[$j], $pinHits)) {
						$j++;
					} else {
						$foundNewPin = 1;
					}
				}
				repin($pins[$j], $board_id);
			}
	}
	?>
	
	<section id="board" class="home-section text-center">
        <div class="heading-contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wow bounceInDown" data-wow-delay="0.4s">
                            <div class="section-heading">
                                <h2>Your Feed</h2>
                                <i class="fa fa-2x fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Show all pins based on board ID -->
        <div id="pin-container" class="masonry js-masonry"  data-masonry-options='{ "columnWidth": 310, "itemSelector": ".item", "isFitWidth": true }'>
			<div>
            <?php
			$board_id = getBoardID('admin', 'guest');
			if (isset($_SESSION['username'])) {
				$board_id = getBoardID('admin', $_SESSION['username']."followBoard");
			}
                // Where to get board ID from? 
                //ordered by pin_id
				$pinsOrdered = getPinLinks($board_id);
				$pins = array_reverse($pinsOrdered);
				//ordered by pin_id
				$pinNamesOrdered = getNamesOfPinsOnBoardOrdered($board_id);
				$pinNames = array_reverse($pinNamesOrdered);
				//ordered by pin_id
				$pinIDsOrdered = getPinIdOrdered($board_id);
				$pinIDs = array_reverse($pinIDsOrdered);
				//ordered by pin_id
				$isRestaurantArrayOrdered = isRestuarantOrdered($board_id);
				$isRestaurantArray = array_reverse($isRestaurantArrayOrdered);
				//ordered by pin_id
				$descriptionsOrdered = getDescriptionsOfPinsOnBoardOrdered($board_id);	
				$descriptions = array_reverse($descriptionsOrdered);			

				
                for($i = 0; $i < count($pins); $i++) {
					$comments = getComments($pinIDs[$i]);
					$authors = getCommentAuthors($pinIDs[$i]);
					$numLikes = getNumberOfLikes($pinIDs[$i]);
                    echo '
                        <a href="#viewPin" data-target="#viewPin" data-toggle="modal" class="open-viewPin" data-pinDescription="'.$descriptions[$i].'" data-pinOwner="'.getPinOwner($pinIDs[$i]).'" data-comments="';
					
					for ($j = 0; $j < count($comments); $j++) {
						if ($j != 0) {
							echo '~';
						}
						echo $comments[$j];
					}
					echo '" ';
					echo 'data-commentAuthors="';
					for ($j = 0; $j < count($authors); $j++) {
						if ($j != 0) {
							echo '~';
						}
						echo $authors[$j];
					}
					echo '" ';
					if ($isRestaurantArray[$i] == 1) {
						echo 'data-address="'.getRestaurantAddress($pinIDs[$i]).'" ';
					}
					
					echo 'data-isRestaurant="'.$isRestaurantArray[$i].'" data-getPinID="'.(string)$pinIDs[$i].'" data-link="'.$pins[$i].'" data-title="'.$pinNames[$i].'">
                            <div class="item">
                                <div class="body">
                                    <img src="'.$pins[$i].'" />
                                </div>
                                <div class="footer" style="margin-bottom:10px">'
                                    .$descriptions[$i].
                                '</div>
                            </div>';
					echo '
                        </a>';
                }
            ?>
		</div>
        </div>

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
