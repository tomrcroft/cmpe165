<?PHP

//Ardalan Razavi
 

$tableName = "temp_members_table";
 
$confirm_code=md5(uniqid(rand())); 

$username==$_POST['username'];
$name=$_POST['realname'];
$email=$_POST['email'];
$password=$_POST['password'];
$question=$_POST['question'];
$answer=$_POST['answer'];
 
$query="INSERT INTO $tableName(confirm_code, name, email, password, username,question,answer)VALUES('$confirm_code', '$name', '$email', '$password', '$username','$question','$answer')";
$result=mysql_query($query);

 
if($result){

$to=$email;
$subject="Registration confirmation ";
$header="from: ";


$message="Your Comfirmation link \r\n";
$message.="Click on the link to below to activate your account\r\n";
$message.="link/confirmation.php?passkey=$confirm_code";


$sentmail = mail($to,$subject,$message,$header);
}

 
else {
echo "Not found your email in our database";
}

if($sentmail){
echo "An email confirmation was sent to your email:".$email;
}
else {
echo "Cannot send Confirmation link to your e-mail address:".$email;
}

?>