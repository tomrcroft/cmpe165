<?php

if ($_POST && !empty($_POST['username']) && !empty($_POST['pwd'])) {
	validateLogin($_POST['username'], $_POST['pwd']);
}

?>

<!DOCTYPE html>
<html>
<head> 
	<title>Login</title>
</head>
<body>
	<div id = "login">
		<h2>Login</h2>

		<form method="POST" action="">
			<p>
				<label for="name">Username: </label>
				<input type="text" id="name" name="username" autofocus="true"/>
			</p>
			<p>
				<label for="pwd">Password: </label>
				<input type="password" id="pwd" name="pwd" />
			<p>
				<input type="submit" value="Login" name="submit" />
			</p>
		</form>

	</div>
</body>
</html>