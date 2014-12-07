<!-- Upload Pin Modal -->
<script>
function showURLField() {
	$(".imageField").html('<input type="uploadPin" class="form-control" name="pinUrl" placeholder="Paste a URL ending in .JPG, .PNG, or .GIF">');
}

function showMyImageField() {
	//$(".imageField").html('');
	$(".imageField").html('<input type="file" name="fileToUpload" id="fileToUpload">');
}
</script>
<div class="modal fade" id="uploadPin" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="pinUpload" style="margin-top:50px;" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        Pin It
						<button class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="panel-body" >
                        <form id="uploadPinform" class="form-horizontal" name="pinUpload" action="myBoards.php?username=<?php echo $_SESSION['username']; ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-md-9">
                                    <!-- Upload Pin Field -->
                                    <div class="form-group">
                                        <!--<label for="uploadPin" class="col-md-3 control-label">Image</label> -->
										<div class="col-md-20">
                                        	<label for="uploadPin" class="col-md-3 control-label">Select One:</label>
											<button type="button" class="btn btn-secondary btn-sm" onClick="showURLField()">URL</button>
											<button type="button" class="btn btn-secondary btn-sm" onClick="showMyImageField()">My Image</button>
										</div>
										<div class="col-md-20 imageField">
                                            <!--<input type="uploadPin" class="form-control" name="pinUrl" placeholder="Paste a URL ending in .JPG, .PNG, or .GIF">-->
                                        </div>
                                            <label for="uploadPin" class="col-md-3 control-label">Title</label>
                                        <div class="col-md-20">
                                            <input type="input" class="form-control" name="pinTitle" placeholder="Title of Image">
                                        </div>
                                        <label for="uploadPin" class="col-md-3 control-label">Description</label>
                                        <div class="col-md-20">
                                            <textarea rows="2" class="form-control" name="pinDescription" placeholder="Description of Image"></textarea>
                                        </div>
                                        <div class="col-md-20">
                                            <label for="boardname" class="col-md-3 control-label">Board</label>
                                            <select id="boardname" name="boardId" class="form-control" required="required">
                                                <option value="na" selected="">Choose One:</option>

                                                <?php

                                                    $list = getBoardByUser($_SESSION['username']);
                                                    $names = getBoardNames($_SESSION['username']);

                                                    for($i = 0; $i < count($names); $i++) {
                                                        echo '<option value="'.$list[$i].'">'.$names[$i].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <button id="btn-uploadPin" name="submitUploadPin" type="submit" type="button" class="btn btn-info"><i class="icon-hand-right"></i>Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>        
                </div>
            </div> 
        </div>
    </div>    
</div>