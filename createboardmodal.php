<!-- Create New Board Modal -->
<div class="modal fade" id="createBoard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >

                    <div class="panel-heading">
                        <div class="panel-title">Create a New Board</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            <form id="signupform" class="form-horizontal" name="signin" action="myBoards.php" method="POST">
                            
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                
                                <!-- Board Name Field -->
                                <div class="form-group">
                                    <label for="boardname" class="col-md-3 control-label">Board Name</label>
                                    <div class="col-md-9">
                                        <input type="boardname" class="form-control" name="boardname" placeholder="Title your new board">
                                    </div>
                                </div>
                                <!-- Create Board Button -->    
                                <div class="form-group">                      
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-createBoard" name="submitCreateBoard" type="submit" type="button" class="btn btn-info">
                                            <i class="icon-hand-right"></i>Create</button>
                                        <button id="btn-fbsignup" type="button" data-dismiss="modal" onclick="$('#createBoard').hide();" class="btn btn-primary"><i class="icon-facebook"></i>Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- Close Login Alert -->                   
                    </div> <!-- Close Panel Body -->   
                </div> <!-- Close panel info -->
            </div> <!-- Close Login Box -->
        </div> <!-- Close Modal Content -->
    </div> <!-- Close Modal Dialog -->
</div> <!-- Close Modal Fade -->