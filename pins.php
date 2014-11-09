<?php 
    session_start(); 
    include 'actions.php';
    // If user is not logged in, redirect it
    if (!(isset($_SESSION['username']))) {
        header("location:index.php"); //to redirect back to "index.php" after logging out
        exit();
    }
    // This will upload the pin

    if (isset($_POST['submitCommentSend'])) {
        // Add a comment to a pin.
        $pinId = $_POST['pinId'];
        $author = $_SESSION['username'];
        $comment = $_POST['comment'];
 
        submitComment($pinId, $author, $comment);
    }
   
    if (isset($_GET['board'])) {
        $board_id = $_GET['board'];
    } else {
        header("location:index.php"); //to redirect back to "index.php" after logging out
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
		$(document).on("click", ".open-viewPin", function () {
			 var src = $(this).data('link');
			 var title = $(this).data('title');
			 var pinID = $(this).attr('data-getPinID');
			 $(".pinID").val(pinID);
			 // passes the correct image link to viewpinmodal
		     $(".showPic").attr("src", src);
			 // passes the pin title and a close button to viewpinmodal
			 $(".title").html(title + '<button class="close" data-dismiss="modal"onclick="location.reload()">x</button>');
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

    <section id="contact" class="home-section text-center">
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
                for($i = 0; $i < count($pins); $i++) {
					//$_SESSION['imgLink'] = $pins[$i];
                    echo '
                        <a href="#viewPin" data-target="#viewPin" data-toggle="modal" class="open-viewPin" data-getPinID="'.(string)$pinIDs[$i].'" data-link="'.$pins[$i].'" data-title="'.$pinNames[$i].'">
                            <div class="item">
                                <img src="'.$pins[$i].'" />
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
    

    <div class="modal fade" id="viewPin" tabindex="-3" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="panel panel-info" >
                    <div class="panel-body" >

                        <div class="panel-heading">
                            <button type="submit" class="btn btn-primary btn-medium">Pin it</button>
                            <button type="submit" class="btn btn-primary btn-medium">Like</button>
                            <button type="submit" class="btn btn-primary btn-medium">Edit</button>
                             <button type="button" class="btn btn-primary btn-md">View Map</button>
                        </div>

                        <div class="form-group">
                            <div class="col-md-9">
                                <img src="" class="showPic"/>
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
						
						<!-- TODO: add to your board functionality when viewing other people's pins
						<form action="addToBoard.php" method="post">
                        <input id="btn-add-other-user-pin" name="addOtherUserPin" type="submit" class="btn btn-info"> </input>
                            <div class="col-md-20">
                                <label for="boardname" class="col-md-3 control-label">Board</label>
                                <select id="boardname" name="boardname" class="form-control" required="required">
                                    <option value="na" selected="">Choose One:</option>';
									
                                    	<?php /*
                                        $list = getBoardByUser($_SESSION['username']);
                                        $names = getBoardNames($_SESSION['username']);
                                        for($i = 0; $i < count($names); $i++) {
                                            echo '<option value="'.$list[$i].'">'.$names[$i].'</option>';
                                        }
                                		?>
								 </select>
								 
								 <?php /*
								 	if (!$owner) {
								 	   echo '<select id="pin" name="pin" class="form-control" required="required">'.
                                    	   	'<option value="na" selected="">Pin Info:</option>';
											$pin = getPin($localImgLink);
											for ($i = 0; i < count($pin); $i++) {
                                            	echo '<option value="'.$pin[$i].'">'.$pin[$i].'</option>';
                                        	}
                                	echo '</select>';
									}
								*/?>
                            </div>
						</form>-->


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