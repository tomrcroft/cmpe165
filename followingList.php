<!-- Create New Board Modal -->
<div class="modal fade" id="followingList" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >

                    <div class="panel-heading">
                        <div class="panel-title">Following</div>
                    </div>     
					<?php 
					$username = $_SESSION['username'];
					$list = getFollowing($username);
					
					for ($x=0; $x<count($list);$x++)
					{
					
					echo '<h3 > <a href="myBoards.php?username='.$list[$x].'"> <span class="label label-default" >'.$list[$x].'</span></a></h3>';
					}
                    
					
					
					
					?>
					
                    </div> <!-- Close Panel Body -->   
                </div> <!-- Close panel info -->
            </div> <!-- Close Login Box -->
        </div> <!-- Close Modal Content -->
    </div> <!-- Close Modal Dialog -->
</div> <!-- Close Modal Fade -->