<!-- View Pin modal -->
    <div class="modal fade" id="viewPin" tabindex="-3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="panel panel-info" >
                    <div class="panel-heading title">
                        <!-- KEEP THIS, it is set in pins.php -->
                    </div>
                    <div class="panel-body" >

                        <div class="panel-heading" style="margin-top : -15px">
                            <button type="submit" class="btn btn-primary btn-sm">
                            Pin it</button>
                            <button type="submit" class="btn btn-secondary btn-sm">Like</button>


                            <?php
                                if (isset($_SESSION["username"]) && session_status() == PHP_SESSION_ACTIVE && $_SESSION["username"]){
                                    $user = $_SESSION['username'];
                                    echo '
                                    <a href="#editPin" data-toggle="modal" data-target="#editPin">
                                        <button type="submit" class="btn btn-secondary btn-sm">Edit</button>
                                    </a>';
                                }
                            ?>
                                <a id="viewmapBtn" class="btn btn-primary btn-sm" href="mapview.php">
                                    <span class="glyphicon glyphicon-globe"></span>Map</a>
                                    
                            
                        </div>

                        <div class="form-group">
                            <img style="height:auto; max-width:560px;" src="" class=showPic />
                        </div>

                        <form id="commentform" class="form-horizontal" name="commentform" action="" method="POST">
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
								*/?>
                            </div>
						</form>-->


                    </div>        
                </div>
            </div>
        </div>
    </div>
   
        <!-- Get view edit pin modal. -->
    <?php include 'editpinmodal.php' ?>
    