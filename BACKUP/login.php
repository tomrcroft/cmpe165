<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head> 
	<title>Login</title>
</head>
<body>
	<div id = "login">
		<h2>Login</h2>

		<form method="POST" action="loginAction.php">
			<p>
				<label for="name">Username: </label>
				<input type="text" id="name" name="username" autofocus="true"/>
			</p>
			<p>
				<label for="pwd">Password: </label>
				<input type="password" id="pwd" name="password" />
			</p>
			<p>
				<input type="submit" value="Login" name="submit" />
			</p>

			<?php
				if (isset($_SESSION['login_message']))
					echo $_SESSION['login_message'];
			?>
		</form>
	</div>
</body>
</html>