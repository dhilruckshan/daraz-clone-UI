<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	//connect to mysql database
	$conn == new mysqli("localhost", "root", "", "test");
	// the "conn" is a variable(anything can be used) , "test is a database name"

	//check connection
	if ($conn->connect_error) {
		die("Connection Failled:" . $conn->connect_error);
	}

	//collect from data directly
	$full_name = $_POST['full_name'];
	$email = $_POST['email_address'];
	$telephone = $_POST['phone_number'];
	$password = $_POST['password'];
	$nic = $_POST['nic'];
	$address = $_POST['address'];
	//"$post[name is html]"

	//check if email already exists
	$check_email = "SELECT * FROM students WHERE email='$email'";
	$result = $conn->query($check_email);

	if ($result->num_rows > 0) {
		echo "Email is already registered !";
		exit();
	}

	//hash password
	//$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	//insert data (no escaping)
	$insert query = "INSERT INTO students (full_name, email, telephone, password, nic, address)
	VALUES ('$full_name', '$email', '$telephone', '$hashed_password', '$nic', '$address')";

	if ($conn->query($insert_query) === TRUE) {
		echo "Registration Successful ! You can now <a href='login.html'>Login<a>.";
	}
	else{
		echo "Error: " . $conn->error;
	}

	$conn->close();
}
?>