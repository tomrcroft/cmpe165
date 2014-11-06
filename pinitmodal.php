<!-- Upload Pin Modal -->
<div class="modal fade" id="pinIt" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="pinIt" style="margin-top:50px;" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Pin It</div>
                    </div>
                    <div class="panel-body" >
                        <form id="pinItform" class="form-horizontal" name="pinIt" action="pins.php" method="POST">
                            <div class="form-group">
                                <div class="col-md-9">
                                    <!-- Upload Pin Field -->
                                    <div class="form-group">
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
                                    <button id="btn-pinIt" name="submitPinIt" type="submit" type="button" class="btn btn-info"><i class="icon-hand-right"></i>Pin It</button>
                                </div>
                            </div>
                        </form>
                    </div>        
                </div>
            </div> 
        </div>
    </div>    
</div>