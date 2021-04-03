<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
	<div class="header">
		<h2>Student Registration</h2>
	</div>
	
	<form class="lg-frm" style="padding:25px"  method="post" action="register.php">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Admission Number</label>
			<input type="text" class="form-control" placeholder="Enter Your Admission Number" name="studentid" value="<?php echo $studentid; ?>" required>
		</div>
		<div class="input-group">
			<label>First Name</label>
			<input type="text" class="form-control" placeholder="Enter Your First Name" name="fname" value="<?php echo $fname; ?>" required>
			<label>Last Name</label>
			<input type="text"  class="form-control" placeholder="Enter Last Name" name="lname" value="<?php echo $lname; ?>" required>
		</div>
		
		<div class="input-group">
			<label>Email Address</label>
			<input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
			<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

		</div>
		<div class="input-group">
			<label>Date of Birth</label>
			<input type="date" class="form-control" placeholder="Enter Your DOB" name="dob" value="<?php echo $dob; ?>" required>
			<label>Qualifications</label>
			<input type="text"  class="form-control" placeholder="Whats your Qualifications" name="qualifications" value="<?php echo $qualifications; ?>" required>
		</div>
		<div class="input-group">
			<label>Course</label>
			<input type="text"  class="form-control" placeholder="Enter Course of preferrence" name="course" value="<?php echo $course; ?>" required>
		</div>
		
		
		<div class="input-group">
			<label>Password</label>
			<input type="password" class="form-control" placeholder="Enter Password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" class="form-control" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn btn-default pull-right" name="reg_user">Register</button>
		</div>
		<p >
			Already a member? <a href="login.php" ><i>Sign In here</i></a>
			<br>
			<a href="#">Home</a>

		</p>
	</form>
</body>
</html>