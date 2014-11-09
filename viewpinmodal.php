<!-- View Pin modal -->
<div class="modal fade" id="viewPin" tabindex="-3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="panel panel-info" >
                <div class="panel-heading title">
                    <!-- KEEP THIS, it is set in pins.php -->
                </div>
                <div class="panel-body pinbox">

                    <div class="panel-heading" style="margin-top : -15px">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Pin it</button>
                        <button type="submit" class="btn btn-secondary btn-sm">Like</button>


                        <?php
                        if (isset($_SESSION["username"]) && session_status() == PHP_SESSION_ACTIVE && $_SESSION["username"]) {
                            $user = $_SESSION['username'];
                            echo '
                                    <a href="#editPin" data-toggle="modal" data-target="#editPin" onclick="dothis()">
                                        <button type="submit" class="btn btn-secondary btn-sm">Edit</button>
                                    </a>';
                                    
                        }
                        ?>
                        <a class="btn btn-primary btn-sm addmaplink" href="#" onclick="$('.pinbox').hide();
                                $('#mapbox').show()">Add Map</a>
                        <a class="btn btn-primary btn-sm viewmapBtn" href="mapview.php?=address">
                            <span class="glyphicon glyphicon-globe"></span>Map</a>
							
							<script type="text/javascript">
							//TODO Change to check if pin is a restaurant
							if (false) {
								
							}
							</script>

                    </div>

                    <div class="form-group">
                        <img style="height:auto; max-width:560px;" src="" class=showPic />
                    </div>

                    <form id="commentform" class="form-horizontal" name="commentform" method="POST">
                        <div class="form-group">
                            <div class="col-md-9">
                                <!-- Upload Pin Field -->
                                <div class="form-group">
                                    <div class="col-md-20">
                                        <input type="comment" class="form-control" name="comment" placeholder="Leave a comment" style="margin-top:10px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-20">
                                        <label for="uploadPin" class="col-md-3 control-label">Comments</label>
                                        <!-- TODO: Make a mock comment that I can copy (kjetil) -->
                                        <!-- TODO: fetch and list comments -->
                                    </div>
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
                     */ ?>
</div>
                    </form>-->


                </div> 
                <div id="mapbox" class="panel-body" style="display:none;">
                    <label >Add Restaurant Address</label>

                    <div style="float:right; font-size: 85%; position: relative; top:-10px">
                        <a id="addmaplink" href="#" onclick="$('#mapbox').hide();
                                $('.pinbox').show()">Go Back to Pin</a></div>
                    <form id="addressform" class="form-horizontal" name="addressform" action="addAddress.php" method="POST">

                        <div id="addressalert" style="display:none" class="alert alert-danger">
                            <p>Error:</p>
                            <span></span>
                        </div>
                        <br>
                        <!-- Address Field -->
                        <div class="form-group">
                            <label for="address" class="col-md-3 control-label">Address </label>                       
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="address" placeholder="address">
                            </div>
                        </div>

                        <!-- city Field -->
                        <div class="form-group">
                            <label for="city" class="col-md-3 control-label">City </label>                       
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="city" placeholder="city">
                            </div>
                        </div>

                        <!-- state Field -->
                        <div class="form-group">
                            <label for="state" class="col-md-3 control-label">State </label>                       
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="state" placeholder="state (eg. CA)">
                            </div>
                        </div>

                        <!-- zip Field -->
                        <div class="form-group">
                            <label for="zip" class="col-md-3 control-label">Zip Code </label>                       
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="zip" placeholder="zip">
                            </div>
                        </div>
                        
                        <div>
                            <input type="hidden" name="pinid" class="pinID" val="">
                        </div>


                        <!-- submit Button -->    
                        <div class="form-group">                      
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-signup" name="submitAddAddress" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Submit</button>                              
                            </div>
                        </div>


                    </form>
                </div> <!-- Close panel body -->


            </div>
        </div>
    </div>
</div>

<!-- Get view edit pin modal. -->
<?php include 'editpinmodal.php' ?>
<script>
function dothis(){
    $('#viewPin').hide();
}

</script>