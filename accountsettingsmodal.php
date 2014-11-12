<!-- Upload Pin Modal -->
<div class="modal fade" id="accountSettings" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="editPin" style="margin-top:50px;" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <button class="btn btn-link pull-right" onclick=" $('#accountSettings').hide()">X</button>
                        <div class="panel-title">Account Settings</div>
                     
                    </div>
                    <div class="panel-body" >
                        <form id="accountSettingsform" class="form-horizontal" name="accountSettingsform" action="myBoards.php" method="POST">
                            <div class="form-group">
                                <div class="col-md-9">
                                    <!-- Edit Pin Field -->
                                    <div class="form-group">
                                        <label for="realname" class="col-lg-3 control-label" style="font-size: 85%">Full Name</label>
                                        <div class="col-md-20">
                                            <input type="input" class="form-control" name="realname">
                                        </div>
                                        <label for="username" class="col-lg-3 control-label" style="font-size: 85%">Username</label>
                                        <div class="col-md-20">
                                            <input type="input" class="form-control" name="username">
                                        </div>
                                        <label for="password" class="col-lg-3 control-label" style="font-size: 85%">Password</label>
                                        <div class="col-md-20">
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <label for="passverify" class="col-lg-3 control-label" style="font-size: 85%">Confirm Password</label>
                                        <div class="col-md-20">
                                            <input type="password" class="form-control" name="passverify">
                                        </div>
                                    </div>
                                    <button id="btn-editPin" name="submitEditPin" type="submit" type="button" class="btn btn-info">
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
