<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php"><h1><font color="black">Corq</font></h1></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
		    	<ul class="nav navbar-nav">

		    		<?php
                        if (isset($_SESSION["username"]) && session_status() == PHP_SESSION_ACTIVE && $_SESSION["username"]){
                            $user = $_SESSION['username'];
							$verify = checkVerified ($username);

								 if (!$verify)
							 {
							 
							 echo ' <div class="alert alert-danger" role="alert">
								<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								<span class="sr-only">Error:</span>
								Please verify your email address
								</div>';
							 
							 }
							
							
                            echo '<li class="dropdown">
							        <a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$user.'<b class="caret"></b></a>
							        <ul class="dropdown-menu">
								        <li><a href="myBoards.php?username='.$_SESSION['username'].'">My Boards</a></li>
										<li><a href="help.php">Help</a></li>
										<li><a href="logout.php">Logout</a></li>
							        </ul>
						        </li>
						        <li><a href="#uploadPin" data-toggle="modal" data-target="#uploadPin">Pin It</a></li>
				                <li>
					                <form class="form-inline pull-center" role="search" action="search.php" method="GET" style="margin-top:8px; text-align:center;">
						                <div class="form-group">
						                	<input type="text" name="search" class="form-control input-medium" placeholder="boards, pins, or people" >
						                </div>
						                <button type="submit" class="btn btn-primary btn-medium">Go</button>
					                </form>
				                </li>';
								
							
								
								
                        } else {
                            echo '<li><a href="#loginRegister" data-toggle="modal" data-target="#myModal">Login/Register</a></li>
				                <li>
					                <form class="form-inline pull-center" role="search" style="margin-top:8px; text-align:center;">
						                <div class="form-group">
						                	<input type="text" name="search" class="form-control input-medium" placeholder="boards, stickers, or people" >
						                	<button type="submit" class="btn btn-primary btn-medium">Go</button>
						                </div>
					                </form>
				                </li>';
                        }
                    ?>
		    	</ul>
            </div> <!-- /.navbar-collapse -->
        </div> <!-- /.container -->
    </nav>