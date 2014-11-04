<!-- View Pin modal -->
<?php 
// $imgLink is set in pins.php to the correct image link
	$localImgLink = $imgLink; 
?>
    <div class="modal fade" id="viewPin" tabindex="-3" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="panel panel-info" >
                    <div class="panel-body" >

                        <div class="panel-heading">
                            <button type="submit" class="btn btn-primary btn-medium">Pin it</button>
                            <button type="submit" class="btn btn-primary btn-medium">Like</button>
                            <button type="submit" class="btn btn-primary btn-medium">Edit</button>
                        </div>

                        <div class="form-group">
                            <div class="col-md-9">
                                <img src=<?php echo $localImgLink ?> />
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