<!-- Edit Pin Modal -->
<div class="modal fade" id="editPin" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="editPin" style="margin-top:50px;" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <button class="btn btn-link pull-right" data-dismiss="modal" onclick="$('#editPin').hide();$('#viewPin').show()">X</button>
                        <div class="panel-title">Pin Settings</div>
                     
                    </div>
                    <div class="panel-body" >
                        <form id="editPinform" class="form-horizontal" name="editPin" action="myBoards.php?username=<?php echo $_SESSION['username']?>" method="POST">
                            <div class="form-group">
                                <div class="col-md-9">
                                    <!-- Edit Pin Field -->
                                    <div class="form-group">
                                            <label for="uploadPin" class="col-md-3 control-label">Title</label>
                                        <div class="col-md-20">
                                            <input type="input" class="form-control newPinName" name="pinTitle" placeholder="Title of Image">
                                        </div>
                                        <label for="uploadPin" class="col-md-3 control-label">Description</label>
                                        <div class="col-md-20">
                                            <textarea rows="2" class="form-control" name="pinDescription" placeholder="Description of Image"></textarea>
                                        </div>
										<!--
                                        <div class="col-md-20">
                                            <label for="boardname" class="col-md-3 control-label">Board</label>
                                            <select id="boardname" name="boardId" class="form-control" required="required">
                                                <option value="na" selected="">Choose One:</option>

                                                <?php/*

                                                    $list = getBoardByUser($_SESSION['username']);
                                                    $names = getBoardNames($_SESSION['username']);

                                                    for($i = 0; $i < count($names); $i++) {
                                                        echo '<option value="'.$list[$i].'">'.$names[$i].'</option>';
                                                    }*/
                                                ?>
                                            </select>
                                        </div>
										-->
										
										<input type="hidden" name="pinName" class="oldPinName" value="">
                                    </div>
                                    <button id="btn-editPin" name="submitEditPin" type="submit" type="button" class="btn btn-info"><i class="icon-hand-right"></i>Save</button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>        
                </div>
            </div> 
        </div>
    </div>    
</div>
