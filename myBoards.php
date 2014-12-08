<?php 
    session_start(); 
    include 'actions.php';
    // If user is not logged in, redirect it
    if (!(isset($_SESSION['username']))) {
        header("location:index.php"); //to redirect back to "index.php" after logging out
        exit();
    }
	
	//create a board
    if (isset($_POST['submitCreateBoard'])) {
        $owner = $_SESSION['username'];
        $boardname = $_POST['boardname'];
        $privacy   = $_POST['privacy'];
        
        addBoard($owner, $boardname);
        changePrivacy($boardname,$privacy); // set privacy for board
		header("location:myBoards.php?username=".$_SESSION['username']);
    }
    // change the name of a board and privacy
     if (isset($_POST['submitEditBoard'])) {
        $owner = $_SESSION['username'];
        $oldboardname = $_POST['oldboardname'];
        $newboardname = $_POST['newboardname'];
        $privacy = $_POST['privacy'];
        editBoardName($owner,$oldboardname,$newboardname);
        changePrivacy($newboardname,$privacy);
         // set privacy for board
    }
	// remove a board
    if (isset($_GET['boardname'])) {
        $board_id = $_GET['boardname'];
        removeBoard($board_id);
		header("location:myBoards.php?username=".$_SESSION['username']);
    }
    if (isset($_POST['submitUploadPin'])) {
        $owner = $_SESSION['username'];
        $boardId = $_POST['boardId'];
        $title = $_POST['pinTitle'];
        $desc = $_POST['pinDescription'];
		if (isset($_POST['pinUrl'])) {
			$url = $_POST['pinUrl'];
			addPin($owner, $boardId, $title, $desc, $url);
		}
		else {
			$target_dir = "upload/";
			$target_file = $target_dir . $_SESSION['username'] . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			//if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        $uploadOk = 1;
			    } else {
			        $uploadOk = 0;
			    }
			//}
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "<script> alert('You have already uploaded a file with the same name, please rename your image and try again.') </script>";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 5000000) {
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        echo "The file ". $target_file. " has been uploaded.";
					addPin($owner, $boardId, $title, $desc, $target_file);
			    } else {
			    }
			}
		}
        	
    }
    if (isset($_POST['submitFollow'])) {
        $user = $_SESSION['username'];
        $following = $_GET['username'];
        follow($user, $following);
    }
    if (isset($_POST['submitUnfollow'])) {
        $user = $_SESSION['username'];
        $following = $_GET['username'];
        unFollow($user, $following);
    }		
	
	if (isset($_POST['submitEditPassword'])) {
		$userName = $_SESSION['username'];
		$oldPassword = $_POST['oldpassword'];
		$newPassword = $_POST['newpassword'];
		$confirmedPassword = $_POST['passverify'];
		if (verifyPassword($userName, $oldPassword)) {
			if ($newPassword == $confirmedPassword) {
				editUser($userName, $newPassword);
				echo '<script type="text/javascript">';
				echo 'alert("Account Updated")';
				echo '</script>';
			} else {
				echo '<script type="text/javascript">';
				echo 'alert("Passwords do not match, please try again")';
				echo '</script>';
			}
		} else {
			echo '<script type="text/javascript">';
			echo 'alert("Old Password is invalid!")';
			echo '</script>';
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
    <script>
      function removeboard(eventboard)
        {
            if(confirm("Do you want to delete the board?"))
            {   
                window.location = "myBoards.php?boardname="+eventboard;
            }
        
        }
     function editboard(editboard)
     {
         if(confirm("Do you want to delete the board?"+editboard))
        
         { 
             window.location = "myBoards.php?boardname="+editboard;
         }
    } 
    </script>
	
	<!-- This NEEDS to be here, JQuery needs to be defined before it can be used -->
	<script src="js/jquery.min.js"></script>
	
	<!-- This is called when a pin is clicked, passes image link and pin title-->
	<script type="text/javascript">
		$(document).on("click", ".open-editBoard", function () {
			var boardTitle = $(this).attr('data-boardName');
			var privacyCheck = $(this).attr('data-privacyCheck');
		 	$(".oldBoardName").val(boardTitle);
		 	$(".boardName").val(boardTitle);
			if (privacyCheck == 1) {
				$('.privateButton').prop('checked',true);
			} else {
				$('.publicButton').prop('checked',true);
			}
			
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
                                                    $following = $_GET['username'];
                                                    $followed = isFollowing($user, $following);
                                                ?>
                                                <ul class="nav nav-pills center">
                                                    <li class="active" style="padding-left:3em">
                                                        <!-- TODO: count all pins on all boards -->
                                                        Pins<span class="badge pull-right"><?php echo $numberOfPins '  '; ?></span>
                                                    </li>
                                                    <li class="active" style="padding-left:3em">
                                                        Boards<span class="badge pull-right"> <?php echo $numberOfBoards '  '; ?></span>
                                                    </li>
                                                    <?php
                                                        if ($isOwner){
                                                            echo '
                                                            <li class="active" style="padding-left:3em; margin-top:-5px">
                                                                <button href="#followingList" data-toggle="modal" data-target="#followingList" class="btn btn-primary btn-sm">Following</button>
                                                            </li>
                                                            <li class="active" style="padding-left:3em; margin-top:-5px">
                                                                <button href="#likesList" data-toggle="modal" data-target="#likeList" class="btn btn-primary btn-sm">Likes</button>
                                                            </li>
                                                            <li class="active" style="padding-left:3em; margin-top:-5px">
                                                                <button href="#accountSettings" data-toggle="modal" data-target="#accountSettings" class="open-accountSettings btn btn-primary btn-sm">Account Settings</button>
                                                            </li>';
                                                        } elseif ($followed == false){
                                                            echo '<li class="active" style="padding-left:3em; margin-top:-5px">
                                                                <form method="POST">
                                                                    <button type="submit" name="submitFollow" class="btn btn-primary btn-sm">Follow</button>
                                                                </form>
                                                            </li>';
                                                        } elseif ($followed == true) {
                                                            echo '<li class="active" style="padding-left:3em; margin-top:-5px">
                                                                <form method="POST">
                                                                    <button type="submit" name="submitUnfollow" class="btn btn-primary btn-sm">Unfollow</button>
                                                                </form>
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
					
					
					
					/*#by clicking on this, it will show the list of the following boards 
						
						echo '<div class="col-xs-6 col-sm-3 col-md-3">
                            <div class="wow bounceInUp" data-wow-delay="0.2s">
                                <a href="#followingList" data-toggle="modal" data-target="#followingList">
                                    <div class="team boxed-grey">
                                        <div class="inner">
                                            <div style="margin-top:-15px">
                                                <h5>Following</h5>
                                            </div>
                                            <div class="avatar">
                                                <img src="img/white.jpg" alt="" class="img-responsive img-circle" /></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>';
					

						#by clicking on this, it will show the list of the pins that user liked 
					echo '<div class="col-xs-6 col-sm-3 col-md-3">
                            <div class="wow bounceInUp" data-wow-delay="0.2s">
                                <a href="#likesList" data-toggle="modal" data-target="#likeList">
                                    <div class="team boxed-grey">
                                        <div class="inner">
                                            <div style="margin-top:-15px">
                                                <h5>Likes</h5>
                                            </div>
                                            <div class="avatar">
                                                <img src="img/white.jpg" alt="" class="img-responsive img-circle" /></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>';*/
						
				
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
						$privacyCheck = checkPrivacy($boardIDs[$i]);
                        $boardPreview = getBoardPreview($boardIDs[$i]);
                        if (!(isset($boardPreview))) {
                            $boardPreview = "img/pins/preview.jpg";
                        }
                        if($isOwner == true){
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
                                    </a>'; }
                        // not board owner this will check privacy of the board and show
                        // public = 0 and private = 1
                        if($isOwner != true && $privacyCheck == 0){
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
						}
						if ($isOwner == true) {
							echo '<!-- edit board name & privacy -->
                                 <div class="btn-group" role="group" aria-label="..." style="margin-top:30px">
                                 	<a id="btn-editBoard"  name="editButton" data-toggle="modal" data-target="#editBoard" data-boardName="'.$boardNames[$i].'"
                                 		data-privacyCheck="'.$privacyCheck.'" class="btn btn-sm btn-secondary pull-left edit-board open-editBoard"
                                        onclick="editboard('.$boardNames[$i].')">
                                	<span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>                            
    								<!-- Delete this board from database-->
                                    <button id="btn-deleteBoard"  name="submitDeleteButton" type="submit"
                                    	class="btn btn-sm btn-secondary pull-right" onclick="removeboard('.$boardIDs[$i].')">
                                	<i class="icon-hand-left"></i>delete</button>
                                 </div>';
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
    <!-- Get account settings modal. -->
    <?php include 'accountsettingsmodal.php' ?>
    <!-- Get board settings modal . -->
    <?php include 'boardsettingmodal.php' ?>
	
	
	
	<?php include 'followingList.php' ?>
	
	<?php include 'likesList.php' ?>
	
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

</body>

</html>