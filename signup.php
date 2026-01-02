<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	//connect to mysql database
	$conn == new mysqli("localhost", "root", "", "signup_db");
	// the "conn" is a variable(anything can be used) , "test is a database name"

	//check connection
	if ($conn->connect_error) {
		die("Connection Failled:" . $conn->connect_error);
	}

	//collect from data directl
	$email = $_POST['email'];
	//"$post[name is html]"

	//check if email already exists
	$check_email = "SELECT * FROM signup_TB WHERE email='$email'";
	$result = $conn->query($check_email);

	if ($result->num_rows > 0) {
		echo "Email is already registered !";
		exit();
	}

	//hash password
	//$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	//insert data (no escaping)
	$insert_query = "INSERT INTO signup_TB (email)
	VALUES ('$email')";

	if ($conn->query($insert_query) === TRUE) {
		echo "Registration Successful ! You can now <a href='login.html'>Login<a>.";
	}
	else{
		echo "Error: " . $conn->error;
	}

	$conn->close();
}
?>