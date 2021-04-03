<?php 
	session_start();
	include('../../db/connect.php');

		// variable declaration
		$studentid = "";
		$fname = "";
		$lname = "";
		$email    = "";
		$dob = "";
		$qualifications = "";
		$course = "";
		$password_1 = "";
		$password_2 = "";
		$errors = array(); 
		$_SESSION['success'] = "";

	

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$studentid = mysqli_real_escape_string($db, $_POST['studentid']);
		$fname = mysqli_real_escape_string($db, $_POST['fname']);
		$lname = mysqli_real_escape_string($db, $_POST['lname']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$dob = mysqli_real_escape_string($db, $_POST['dob']);
		$qualifications = mysqli_real_escape_string($db, $_POST['qualifications']);
		$course = mysqli_real_escape_string($db, $_POST['course']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($studentid)) { array_push($errors, "Admission Number  is required"); }
		if (empty($fname)) { array_push($errors, "First name is required"); }
		if (empty($lname)) { array_push($errors, "Last name is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($dob)) { array_push($errors, "Date of birth is required"); }
		if (empty($qualifications)) { array_push($errors, "Enter your last high level of education"); }
		if (empty($course)) { array_push($errors, "Course of Choice"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO students (studentid, fname, lname, email,  dob, qualifications, course, password) 
					  VALUES('$studentid', '$fname', '$lname', '$email', '$dob', '$qualifications', '$course', '$password')";
			mysqli_query($db, $query);

			$_SESSION['fname'] = $fname;
			$_SESSION['success'] = "You are now logged in";
			header('location:../index.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$studentid = mysqli_real_escape_string($db, $_POST['studentid']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($studentid)) {
			array_push($errors, "Admission number is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM students WHERE studentid='$studentid' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				while ($row = mysqli_fetch_assoc($results)) {
					$_SESSION['studentid'] = $row['studentid'];
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['lname'] = $row['lname'];
				$_SESSION['email']=$row['email'];
				$_SESSION['dob']=$row['dob'];
				$_SESSION['qualifications']=$row['qualifications'];
				$_SESSION['course']=$row['course'];
				$_SESSION['id']=$row['id'];
				$_SESSION['success'] = "You are now logged in";
				header('location: ../index.php');
				}
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>