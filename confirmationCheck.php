<?php

//Ardalan Razavi


$passkey=$_GET['passkey'];
$table="userinfo";


$query="SELECT * FROM $temp_table WHERE confirm_code ='$passkey'";
$result1=mysql_query($query);


if($result1){


$count=mysql_num_rows($result1);

if($count==1){
$rows=mysql_fetch_array($result1);
$name=$rows['name'];
$email=$rows['email'];
$password=$rows['password']; 
$username=$rows['username'];
$question =$rows['question'];
$answer =$rows['answer'];

$queryInset="INSERT INTO $registered_member_table(name, email, password, username,question,answer)VALUES('$name', '$email', '$password', '$username','$question','$answer')";
$result2=mysql_query($queryInsert);
}


else {
echo "Confirmation code is not correct";
}

if($result2){

echo "Wohoo, you are actual member of our site, congratulation";


 
$queryDelete="DELETE FROM $temp_table WHERE confirm_code = '$passkey'";
$result3=mysql_query($queryDelete);

}

}
?>