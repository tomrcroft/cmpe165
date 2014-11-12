<?php 
    session_start(); 
    include 'actions.php';
    // If user is not logged in, redirect it
    if (!(isset($_SESSION['username']))) {
        header("location:index.php"); //to redirect back to "index.php" after logging out
        exit();
    }

    if (isset($_POST['submitCommentSend'])) {
        // Add a comment to a pin.
        $pinId = $_POST['pinId'];
        $author = $_SESSION['username'];
        $comment = $_POST['comment'];
 
        submitComment($pinId, $author, $comment);
    }
   
    if (isset($_GET['board'])) {
        $board_id = $_GET['board'];
		$boardOwner = getBoardOwner($board_id);
    } else {
        header("location:boards.php"); //to redirect back to "index.php" after logging out
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
    <link href="css/masonrystyle.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="color/default.css" rel="stylesheet">
	
	<!-- This NEEDS to be here, JQuery needs to be defined before it can be used -->
	<script src="js/jquery.min.js"></script>
	
	<!-- This is called when a pin is clicked, passes image link and pin title-->
	<script type="text/javascript">
		var title;

		
		$(document).on("click", ".open-viewPin", function () {
			 var src = $(this).data('link');
			 title = $(this).data('title');
			 var isRestaurant = $(this).attr('data-isRestaurant');
			 var pinID = $(this).attr('data-getPinID');
			 var comments = $(this).data('comments').split("~");
			 var commentAuthors = $(this).attr('data-commentAuthors').split("~");
			 $(".repinID").val(pinID);
			 $("commentPinID").val(pinID);
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
			 
			 if ("<?php echo $_SESSION['username']; ?>" == "<?php echo $boardOwner; ?>") {
				 $(".addmaplink").show();
				 $(".pinID").val(pinID);	
				 
				 $(".open-editPin").show();
				 $(".likeButton").hide();
				 
			 } else {
			 	
				$(".open-editPin").hide();
				$(".addmaplink").hide();
				$(".likeButton").show();
			 }
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
			 $(".title").html(title + '<button class="close" data-dismiss="modal" onclick="$("#viewPin").hide();">x</button>');
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

    <section id="top" class="top">
    </section>

    <section id="board" class="home-section text-center">
        <div class="heading-contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wow bounceInDown" data-wow-delay="0.4s">
                            <div class="section-heading">
                                <h2><?php echo getBoardName($board_id); ?></h2>
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
                $pins = getPinLinks($board_id);
				$pinNames = getNamesOfPinsOnBoard($board_id);
				$pinIDs = getPinId($board_id);
				$isRestaurantArray = isRestuarant($board_id);
				$descriptions = getDescriptionsOfPinsOnBoard($board_id);				
				
                for($i = 0; $i < count($pins); $i++) {
					$comments = getComments($pinIDs[$i]);
					$authors = getCommentAuthors($pinIDs[$i]);
                    echo '
                        <a href="#viewPin" data-target="#viewPin" data-toggle="modal" class="open-viewPin" data-comments="';
					
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
							/*
					if (isset($_GET['owner'])) {
						echo'
                            <div class="col-md-offset-8 col-md-4">
								<form action="pins.php?&description='..'&imgLink='.$pins[i].'" method="post">
                                <input id="btn-add-other-user-pin" name="addOtherUserPin" type="submit" type="button" class="btn btn-info"/>
                                    <i class="icon-hand-right"></i>+</button>
                                    <div class="col-md-20">
                                        <label for="boardname" class="col-md-3 control-label">Board</label>
                                        <select id="boardname" name="boardname" class="form-control" required="required">
                                            <option value="na" selected="">Choose One:</option>';
                                            <?php
                                                $list = getBoardByUser($_SESSION['username']);
                                                $names = getBoardNames($_SESSION['username']);
                                                for($i = 0; $i < count($names); $i++) {
                                                    echo '<option value="'.$list[$i].'">'.$names[$i].'</option>';
                                                }
                                        echo '    
                                        </select>
                                    </div>
								</form>
                            </div>';
					}*/
					echo '
                        </a>';
                }
            ?>
        </div>

    </section>

    <!-- Get login/register modal. -->
    <?php include 'loginmodal.php' ?>
    <!-- Get upload pin modal. -->
    <?php include 'pinmodal.php' ?>
    <!-- Get view pin modal. -->
    <?php include 'viewpinmodal.php' ?>
    
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
    </script>
</body>

</html>