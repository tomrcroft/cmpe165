<!-- View Pin modal -->
<?php 
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
                                <!-- $imgLink is set in pins.php to the correct image link -->
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


                    </div>        
                </div>
            </div>
        </div>
    </div>