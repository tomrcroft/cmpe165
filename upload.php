<?phpinclude 'queries.php';if(isset($_POST['uploadPinform']))      {    $path=$_POST['uploadPin'];    $board=$_POST['boardname'];    $username=$_SESSION['username'];    if(addPin($username,$board,$path))        else    echo "Error: Cannot Pin it!";                                        }?>