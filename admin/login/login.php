<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	
	
	<form method="post" action="login.php">
				<div class="header">
					<h2>Login</h2>
				</div>
		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Admission Number</label>
			<input type="text" name="studentid">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Dont have an account? <a href="register.php">Sign Up here.</a>
			<br>
			<p><a href="enter_email.php">Forgot your password?</a></p>
		</p>
	</form>


</body>
</html>