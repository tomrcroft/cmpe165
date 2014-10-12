<?php

/* 
 * @Author Tom Croft
 */
//connection String to DB
//Make sure to change your password
$con=mysqli_connect("localhost","root","password","cmpe165");

/**
  * Function used to input user into database with all the information
  *
  * takes the information from the registration page and inputs it into the database.
  *
  * @param String $uName is the username of the user whos information will be put in.
  * @param String $password is the password of the user whos information will be put in.
  * @param String $name is the email of the user whos information will be put in.
  */
function register($uName, $password, $name)
{
        global $con;
        

    mysqli_query($con,"insert into userInfo (username, realName, password) values('$uName', '$name', '$password');");
    return TRUE;    
}

function getPassword($uName)
{
        global $con;
    
    $result = mysqli_query($con,"select password from userInfo WHERE username='$uName'");
    $resultArray = mysqli_fetch_array($result);
    return $resultArray[0];    
}

function getName($uName)
{
        global $con;
        
    $result = mysqli_query($con,"select realName from userInfo WHERE username='$uName'");
    $resultArray = mysqli_fetch_array($result);
    return $resultArray[0];   
}



?>

