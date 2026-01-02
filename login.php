<?php
//start session
session_start();

// Check if for is submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {

	//Get form data
	$username = $_POST['username'];
	$password = $_POST['password'];

	//Create connection
	$conn = new mysqli("localhost", "root", "", "login_DB");

	//Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	//prevent sql injection
	$email = $conn->real_escape_string($email);
	$password = $conn->real_escape_string($password);

	//query the database
	$sql = "SELECT * FROM students WHERE email='$email' AND password='$password'";
	$result = $conn->query($sql);

	if ($result->num_rows == 1) {
		//login success
		$_SESSION['email'] = $email;
		echo "Login Successful. Welcome, ";
		//redirect to dashboard or homepage
		//header("LLocation: dashboard.php");
		//exit();
	}
	else {
		//login failed
		echo "Invalid username or password.";
	}

	$conn->close();

 }