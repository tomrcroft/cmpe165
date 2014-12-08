<!-- Upload Pin Modal -->
<div class="modal fade" id="accountSettings" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="editPin" style="margin-top:50px;" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <button class="btn btn-link pull-right" data-dismiss="modal" onclick=" $('#accountSettings').hide()">X</button>
                        <div class="panel-title">Change Password</div>
                     
                    </div>
                    <div class="panel-body" >
                        <form id="accountSettingsform" class="form-horizontal" name="accountSettingsform" action="myBoards.php?username=<?php echo $_SESSION['username']; ?>" method="POST">
                            <div class="form-group">
                                <div class="col-md-9">
                                    <!-- Edit Pin Field -->
                                    <div class="form-group">
	                                    <label for="password" class="col-lg-3 control-label" style="font-size: 85%">Old Password</label>
	                                    <div class="col-md-20">
	                                    	<input type="password" class="form-control" name="oldpassword">
	                                    </div>
                                        <label for="password" class="col-lg-3 control-label" style="font-size: 85%">New Password</label>
                                        <div class="col-md-20">
                                            <input type="password" class="form-control" name="newpassword">
                                        </div>
                                        <label for="passverify" class="col-lg-3 control-label" style="font-size: 85%">Confirm New Password</label>
                                        <div class="col-md-20">
                                            <input type="password" class="form-control" name="passverify">
                                        </div>
                                    </div>
                                    <button id="btn-editPin" name="submitEditPassword" type="submit" type="button" class="btn btn-info">
                                        <i class="icon-hand-right"></i>Save Settings
                                    </button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>        
                </div>
            </div> 
        </div>
    </div>    
</div>
