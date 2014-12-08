<!-- View Pin modal -->

<script>
	$(document).on("click", ".open-editPin", function () {
		$(".newPinName").val(title);
		$(".oldPinName").val(title);
	});
	
    function likeButtonClick() {
        //$(".likeButtonDiv").html('<button type="button" class="btn btn-secondary btn-sm unlikeButton" onClick="unLikeButtonClick();">Unlike</button>');
		var pin_id = $(".repinID").val();
		$.ajax({
		      method: 'get',
		      url: 'addRemoveLike.php',
		      data: {
				'add': true 
		        'pin_id': pin_id,
		        'ajax': true
		      },
		      success: function(data) {
		        alert("It worked");
				var currentLikes = parseInt($(".likesBadge").html(), 10);
				$(".likesBadge").html(++currentLikes);
		      }
		    });
		$('.likeButton').off('click').on('click', 'unLikeButtonClick()');
		//var pin_id = $(".pinID").val();
		//alert(pin_id);
		//var jqxhr = $.post("addlike.php", {pin_id: 10 } );
		//alert( "success" );
		//addLike($user_id, $pin_id)
		//})
		// TODO: Disable like button
        // TODO: Run query to like from JS function
    }
	
	function unLikeButtonClick() {
		//$(".likeButtonDiv").html('<button type="button" class="btn btn-secondary btn-sm likeButton" onClick="likeButtonClick();">Like</button>');
		var pin_id = $(".repinID").val();
		$.ajax({
		      method: 'get',
		      url: 'addRemoveLike.php',
		      data: {
				'remove': true 
		        'pin_id': pin_id,
		        'ajax': true
		      },
		      success: function(data) {
		        alert("It worked");
				var currentLikes = parseInt($(".likesBadge").html(), 10);
				$(".likesBadge").html(--currentLikes);
		      }
		    });
		$('.likeButton').off('click').on('click', 'likeButtonClick()');
	}
</script>

<div class="modal fade" id="viewPin" tabindex="-3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="panel panel-info" >
                <div class="panel-heading title">
                    <!-- KEEP THIS, it is set in pins.php -->
                </div>
                <div class="panel-body pinbox">

                    <div class="panel-heading pinButtonBar" style="margin-top : -15px">
                        <button id="btn-signup" name="submitRepin" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Repin</button>
						<button type="button" class="btn btn-secondary btn-sm likeButton" onclick="likeButtonClick();">Like</button>
						<!-- Edit Pin is not working, so it is now a submodal-->
                        <a href="#editPin" class="open-editPin" data-toggle="modal" data-target="#editPin" >
                                        <button type="submit" class="btn btn-primary btn-sm" onclick="$('.pinbox').hide(); $('#editPinform').show()" >Edit</button>
                        </a>

                        <a class="btn btn-primary btn-sm addmaplink" href="#" onclick="$('.pinbox').hide();
                                $('#mapbox').show()">Add or Edit Map</a>
                        <a class="btn btn-primary btn-sm viewmapBtn" href="mapview.php?=address">
                            <span class="glyphicon glyphicon-globe"></span>Map</a>
                        <a class="btn btn-primary btn-sm repinButton" href="#" onclick="$('.pinbox').hide();
                                $('#repinBox').show()">PIN IT</a>
						<p>Likes<span class="badge likesBadge pull-right"></span><p>
						<!--<div class="pinLikesBadge">
									set in boards.php //TODO: make this look ok
						</div>      -->                 
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
								
			                    <div>
			                        <input type="hidden" name="commentPinID" class="repinID" val="">
			                    </div>
								
			                    <div>
			                        <input type="hidden" class="numberOfComments" data-loadedComments="">
			                    </div>
								
								<button id="btn-commentSend" name="submitCommentSend" type="submit" type="button" class="btn btn-info"><i class="icon-hand-right"></i>Send</button>
                                <div class="form-group">
                                    <div class="col-md-20">
                                        <label for="uploadPin" style="margin-left : 15px" class="control-label">Comments:</label>
                                        <!-- TODO: Make it look better -->                                       
										<div class="commentField" style="margin-left : 15px">
										</div>
                                    </div>
                                </div>                              
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
                                $('.pinbox').show()">Go Back to Pin</a>
					</div>
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
				
				
				<!-- Repin sub-modal -->
                <div id="repinBox" class="panel-body" style="display:none;">
					
					<div style="float:right; font-size: 85%; position: relative; top:-10px">
                    	<a id="addmaplink" href="#" onclick="$('#repinBox').hide();
                            $('.pinbox').show()">Go Back to Pin</a>
					</div>
					<form id="repinForm" class="form-horizontal" name="repinForm" action="repin.php" method="POST">
                    <div class="col-md-20">
                        <label for="boardname" class="col-md-3 control-label">Board</label>
                        <select id="boardname" name="boardID" class="form-control" required="required">
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
					
                    <div>
                        <input type="hidden" name="repinID" class="repinID" val="">
                    </div>
					
                    <div class="form-group">                      
                        <div class="col-md-offset-3 col-md-9">
							<button id="btn-signup" name="submitRepin" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Repin</button>
                        </div>
                    </div>
                    </form>
                </div>
				
				<!-- /Repin sub-modal -->

				<!-- Edit pin sub-modal -->

                <div id="editPinform" class="panel-body" style="display:none;">
					<div style="float:right; font-size: 85%; position: relative; top:-10px">
                    	<a id="addmaplink" href="#" onclick="$('#editPinform').hide();
                            $('.pinbox').show()">Go Back to Pin</a>
					</div>
                    <form class="form-horizontal" name="editPin" method="POST">
                        <div class="form-group">
                            <div class="col-md-9">
                                <!-- Edit Pin Field -->
                                <div class="form-group">
                                        <label for="uploadPin" class="col-md-3 control-label">Title</label>
                                    <div class="col-md-20">
                                        <input type="input" class="form-control newPinName" name="pinTitle" value="" placeholder="Title of Image">
                                    </div>
                                    <label for="uploadPin" class="col-md-3 control-label">Description</label>
                                    <div class="col-md-20">
                                        <textarea rows="2" class="form-control pinDescription" name="pinDescription" value="" placeholder="Description of Image"></textarea>
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
				<!-- /Edit pin sub-modal -->
				
            </div>
        </div>
    </div>
</div>

<!-- Get view edit pin modal. -->
<!--<?php //include 'editpinmodal.php' ?> -->