<?php
      include 'index.php';
      include 'reset.php';
  
    if(!isset($_POST['submitResetBtn']))
    {
        //TODO: go back     
    } else {
    	$_SESSION['resetUsername'] = $_POST['resetusername'];
    }
    
    
        
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Corq</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/masonrystyle.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="color/default.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
            
            $('#resetQModal').modal({
            backdrop: 'static',
            keyboard: false
            })
            
        
        });
    
    </script>
</head>
<!-- to show the modal onpage load-->
<body onload="$('#resetQModal').modal('show')">
    
  
    <div class="container">
       <div class="row">
          <div class="col-md-8 col-md-offset-4">
             <div class="modal fade" id="resetQModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-md modal-dialog " >
                    <div class="modal-content">
                        <div class="modal-body">

                        <?php
                                // the result of name validation (true or false)
                               
                               // the  username of forget password account
                               $resetusername = $_POST['resetusername'];
                               // check ture of false
                                 if(checkUserName($resetusername) == 0) {
                                     // the question will get it from database
                                    //$question =  getSecurityQuestion($resetusername);
                                    $question = getSecurityQuestion($resetusername);
                            echo'
                              <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h6>Password Reset Step 2 of 2</h6>
                                </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <form id="resetform2" class="form-horizontal" name="resetprocess1" 
                                                action="index.php" method="POST">
                                                <div class="form-group">
                                                            <!-- label for Security Question field-->
                                                    <div class="col-md-8 col-md-offset-2">
                            <!-- the question retireve from database will appear here-->
                                                    <label for="reset1">'. $question .'</label>
                                                    </div>
                                                            <!-- input text for Answer-->
                                                    <div class="col-md-8 col-md-offset-2">
                                                    <input type="text" class="form-control" name="useranswer" 
                                                    placeholder="Please Enter Security Answer" required autofocus>
                                                    </div>
                                                </div><!-- end of form-group-->
                                                <!-- buttons for cancel and submit-->
                                                <div class="col-md-offset-6" style="padding-top:5px">
                                                    <a href="index.php" class="btn btn-default btn-md">Cancel</a>
													<a href="index.php" class="btn btn-default btn-md">
                                                    	<button type="submit" class="btn btn-primary btn-md" name="submitConfirmBtn">
                                                    Send  <span class="glyphicon glyphicon-send"></span></button>
													</a>
                                                </div><!--end of buttons-->
                                            </form>
                                        </div><!--end of row-->
                                    </div><!--end of panel-body-->
                                </div>';
                                    } 
                                    else{
                                    echo ' 
                                            
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                            <h5> <span class="glyphicon glyphicon-ban-circle"></span>Error: '.$resetusername.'</h5>
                                                <p class="bg-danger"><strong> Invalid User Name!</strong></p>
                                                   <p>
                                                     <a href="index.php" class="btn btn-default btn-md">Close</a>                                                   
                                                  </p>
                                    </div>
                                </div> ';}
                                        
                                    ?>
                            </div>
                        </div>
                    </div>
<script>

function dothis()
{
    $("#resetQModal").modal('hide'); 
    $("#resetModal").modal('show');

}
</script>
  
   


<!-- Core JavaScript Files -->
   
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script> 
    <script src="js/jquery.scrollTo.js"></script>
    <script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/masonry.pkgd.js"></script>

</body>

</html>
=======
<?php
      include 'index.php';
      include 'reset.php';
  // validate username here
  $nameresult;
    if(isset($_POST['submitResetBtn']))
    {
        $resetusername = $_POST['resetusername'];
        $_SESSION['resetusername'] = $resetusername;
        //TODO: need to connect with database
       // $nameresult = validateUser($resetusername);
        $nameresult =true;
        $_SESSION['nameresult']= $nameresult;
      
    }
    
    
        
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Corq</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/masonrystyle.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="color/default.css" rel="stylesheet">
    <script>
    $(document).ready(function(){
            
            $('#resetQModal').modal({
            backdrop: 'static',
            keyboard: false
            })
            
        
        });
    
    </script>
</head>
<!-- to show the modal onpage load-->
<body onload="$('#resetQModal').modal('show')">
    
  
    <div class="container">
       <div class="row">
          <div class="col-md-8 col-md-offset-4">
             <div class="modal fade" id="resetQModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-md modal-dialog " >
                    <div class="modal-content">
                        <div class="modal-body">

                        <?php
                                // the result of name validation (true or false)
                               $nameresult = $_SESSION['nameresult'];
                               // the  username of forget password account
                               $resetusername = $_SESSION['resetusername'];
                               // check ture of false
                                 if($nameresult) {
                                     // the question will get it from database
                                    //$question =  getSecurityQuestion($resetusername);
                                    $question = "The Security Question will Appear Here?";
                            echo'
                              <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h6>Password Reset Step 2 of 2</h6>
                                </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <form id="resetform2" class="form-horizontal" name="resetprocess1" 
                                                action="resetAction2.php" method="POST">
                                                <div class="form-group">
                                                            <!-- label for Security Question field-->
                                                    <div class="col-md-8 col-md-offset-2">
                            <!-- the question retireve from database will appear here-->
                                                    <label for="reset1">'. $question .'</label>
                                                    </div>
                                                            <!-- input text for Answer-->
                                                    <div class="col-md-8 col-md-offset-2">
                                                    <input type="text" class="form-control" name="useranswer" 
                                                    placeholder="Please Enter Security Answer" required autofocus>
                                                    </div>
                                                </div><!-- end of form-group-->
                                                <!-- buttons for cancel and submit-->
                                                <div class="col-md-offset-6" style="padding-top:5px">
                                                    <a href="index.php" class="btn btn-default btn-md">Cancel</a>
                                                    <button type="submit" class="btn btn-primary btn-md" name="submitConfirmBtn">
                                                    Send  <span class="glyphicon glyphicon-send"></span></button>
                                                </div><!--end of buttons-->
                                            </form>
                                        </div><!--end of row-->
                                    </div><!--end of panel-body-->
                                </div>';
                                    } 
                                    else{
                                    echo ' 
                                            
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                            <h5> <span class="glyphicon glyphicon-ban-circle"></span>Error: '.$resetusername.'</h5>
                                                <p class="bg-danger"><strong> Invalid User Name!</strong></p>
                                                   <p>
                                                      <button type="button" class="btn btn-info btn-md" onclick= "dothis()" >Retry</button>
                                                      <button type="button" class="btn btn-default btn-md " data-dismiss="modal">Close</button>
                                                      
                                                  </p>
                                    </div>
                                </div> ';}
                                        
                                    ?>
                            </div>
                        </div>
                    </div>
<script>

function dothis()
{
    $("#resetQModal").modal('hide'); 
    $("#resetModal").modal('show');

}
</script>
  
   


<!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script> 
    <script src="js/jquery.scrollTo.js"></script>
    <script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/masonry.pkgd.js"></script>

</body>

</html>
>>>>>>> FETCH_HEAD
