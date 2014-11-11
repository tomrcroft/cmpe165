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
			 var isRestaurant = $(this).attr('data-isRestaurant');
			 if (isRestaurant == 1) {
				var pinID = $(this).attr('data-getPinID');
			 	$(".pinID").val(pinID);
				var address = $(this).attr('data-address');
				//var address = '1 washington sq,San Jose,CA 95192';
				var addressLink = "mapview.php?address=" + address;
				$(".viewmapBtn").attr("href", addressLink);
			 } else {
			 	$(".addmaplink").hide();
				$(".viewmapBtn").hide();
			 }
			 
			 // passes the correct image link to viewpinmodal
		     $(".showPic").attr("src", src);
			 // passes the pin title and a close button to viewpinmodal
			 $(".title").html(title + '<button class="close" data-dismiss="modal"onclick="location.reload()">x</button>');
		});
	</script>

    <script>
        function likeButtonClick() {
            document.getElementById("likeButton").value = "[Like button disabled]";
            // TODO: Disable like button
            // TODO: Run query to like from JS function
        }

        function pinButtonClick() {
            document.getElementById("pinButton").value = "[Pin button disabled]";
            // TODO: Disable pin button
            // TODO: Run pin queries.
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

    <section id="contact" class="home-section text-center">
    
        <div class="panel panel-info" >
                <div class="panel-heading title">
                    <!-- KEEP THIS, it is set in pins.php -->
                </div>
                <div class="panel-body pinbox">

                    <div class="panel-heading" style="margin-top : -15px">
                        <button type="button" id="pinButton" class="btn btn-primary btn-sm" onClick="pinButtonClick();">Pin it</button>
                        <button type="button" id="likeButton" class="btn btn-secondary btn-sm" onClick="likeButtonClick();">Like</button>
                        
                        <?php
                        if (isset($_SESSION["username"]) && session_status() == PHP_SESSION_ACTIVE && $_SESSION["username"]) {
                            $user = $_SESSION['username'];
                            echo '
                                    <a href="#editPin" data-toggle="modal" data-target="#editPin" onclick="dothis()">
                                        <button type="submit" class="btn btn-secondary btn-sm">Edit</button>
                                    </a>';
                                    
                        }
                        ?>
                        <a class="btn btn-primary btn-sm addmaplink" href="#" onclick="$('.pinbox').hide();
                                $('#mapbox').show()">Add Map</a>
                        <a class="btn btn-primary btn-sm viewmapBtn" href="mapview.php?=address">
                            <span class="glyphicon glyphicon-globe"></span>Map</a>
                            
                            <script type="text/javascript">
                            //TODO Change to check if pin is a restaurant
                            if (false) {
                                
                            }
                            </script>

                    </div>

                    <div class="form-group">
                        <img style="height:auto; max-width:560px;" src="" class=showPic />
                    </div>

                    <form id="commentform" class="form-horizontal" name="commentform" method="POST">
                        <div class="form-group">
                            <div class="col-md-9">
                                <!-- Upload Pin Field -->
                                <div class="form-group">
                                    <div class="col-md-20">
                                        <input type="comment" class="form-control" name="comment" placeholder="Leave a comment" style="margin-top:10px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-20">
                                        <label for="uploadPin" class="col-md-3 control-label">Comments</label>
                                        <!-- TODO: Make a mock comment that I can copy (kjetil) -->
                                        <!-- TODO: fetch and list comments -->
                                    </div>
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
                     */ ?>
</div>
                    </form>-->


                </div> 
                <div id="mapbox" class="panel-body" style="display:none;">
                    <label >Add Restaurant Address</label>

                    <div style="float:right; font-size: 85%; position: relative; top:-10px">
                        <a id="addmaplink" href="#" onclick="$('#mapbox').hide();
                                $('.pinbox').show()">Go Back to Pin</a></div>
                    <form id="addressform" class="form-horizontal" name="addressform" action="addAddress.php" method="POST">

                        <div id="addressalert" style="display:none" class="alert alert-danger">
                            <p>Error:</p>
                            <span></span>
                        </div>
                        <br>
                        <!-- Address Field -->
                        <div class="form-group">
                            <label for="address" class="col-md-3 control-label">Address </label>                       
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="address" placeholder="address">
                            </div>
                        </div>

                        <!-- city Field -->
                        <div class="form-group">
                            <label for="city" class="col-md-3 control-label">City </label>                       
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="city" placeholder="city">
                            </div>
                        </div>

                        <!-- state Field -->
                        <div class="form-group">
                            <label for="state" class="col-md-3 control-label">State </label>                       
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="state" placeholder="state (eg. CA)">
                            </div>
                        </div>

                        <!-- zip Field -->
                        <div class="form-group">
                            <label for="zip" class="col-md-3 control-label">Zip Code </label>                       
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="zip" placeholder="zip">
                            </div>
                        </div>
                        
                        <div>
                            <input type="hidden" name="pinid" class="pinID" val="">
                        </div>


                        <!-- submit Button -->    
                        <div class="form-group">                      
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-signup" name="submitAddAddress" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Submit</button>                              
                            </div>
                        </div>


                    </form>
                </div> <!-- Close panel body -->


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