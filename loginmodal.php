	<!-- Login/Register Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	    	<div class="modal-content">
	        	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">                    
	            	<div class="panel panel-info" >

	                    <div class="panel-heading">
	                        <div class="panel-title">Login</div>
	                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot your password?</a></div>
	                    </div>     

	                    <div style="padding-top:30px" class="panel-body" >
	                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
	                        	<form id="loginform" class="form-horizontal" role="form" action="index.php" method="POST">
	                                    
	                            	<div style="margin-bottom: 25px" class="input-group">
	                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	                                    <input required="" id="username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
	                                </div>
	                                
	                            	<div style="margin-bottom: 25px" class="input-group">
	                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	                                        <input required="" id="password" type="password" class="form-control" name="password" placeholder="password">
	                                </div>
	                                    

	                                
	                            	<div class="input-group">
	                                    <div class="checkbox">
	                                        <label>
	                                        	<input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
	                                        </label>
	                                    </div>
	                                </div>

	                                <!-- Button -->
	                                <div style="margin-top:10px" class="form-group">
	                                    <div class="col-sm-12 controls">

	                                    	<!-- Maybe I'll need to change to input type -->
	                                    	<button type="submit" id="signin" name="submitLogin" class="btn btn-success">Login</button>
	                                    	<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>
	                                    </div>
	                                </div>

	                                <!-- Register Here footer -->
	                                <div class="form-group">
	                                    <div class="col-md-12 control">
	                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" > Don't have an account? 
	                                        	<a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()"> Register Here</a>
	                                        </div>
	                                    </div>
	                                </div>   

	                            </form>
	                        </div> <!-- Close Login Alert -->                   
	                    </div> <!-- Close Panel Body -->   
	        		</div> <!-- Close panel info -->
	        	</div> <!-- Close Login Box -->

        		<div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">

                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px">
                            	<a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Or Login Here</a></div>
                        </div>

                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" name="signin" action="index.php" method="POST">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                
                                <!-- Email Field  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                 -->
                                
                                <!-- Username Field -->
                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">Username</label>
                                    <div class="col-md-9">
                                        <input type="username" class="form-control" name="username" placeholder="Username">
                                    </div>
                                </div>

                                <!-- Name Field -->
                                <div class="form-group">
                                    <label for="realname" class="col-md-3 control-label">First and Last Name</label>
                                    <div class="col-md-9">
                                        <input type="realname" class="form-control" name="realname" placeholder="First and Last Name">
                                    </div>
                                </div>

                                <!-- Password Field --> 
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>

                                <!-- Password Verify Field --> 
                                <div class="form-group">
                                    <label for="passverify" class="col-md-3 control-label">Password Verification</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="passverify" placeholder="Password Verification">
                                    </div>
                                </div>

								<!-- Register Button -->    
                                <div class="form-group">                      
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" name="submitRegister" type="submit" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Register</button>
                                        <span style="margin-left:8px;">or</span>
                                    </div>
                                </div>
                                
                                <!-- Facebook button -->
                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                                    </div>                                           
                                </div>

                        	</form>
                        </div> <!-- Close panel body -->
                    </div> <!-- Close panel info -->
        		</div> <!-- Close Sign Up Box -->
	    	</div> <!-- Close Modal Content -->
		</div> <!-- Close Modal Dialog -->
	</div> <!-- Close Modal Fade -->