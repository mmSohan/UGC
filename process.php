<?php
	
	$username = $_POST['user'];
	$password = $_POST['pass'];

	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysql_real_escape_string($username);



	$password = mysql_real_escape_string($password);

	mysql_connect("localhost", "root", "");
	mysql_select_db("login");

	$result = mysql_query("select * from users where username = '$username'
		and password = '$password' ")
	or die("Failed to query database ".mysql_error());

	$row = mysql_fetch_array($result);
	if ($row['username'] == $username && $row['password'] == $password) {
		# code...
		echo "Login Success!!! Welcome ".$row['username'];
		header('Location: submitInformation.php');
	}else{
		echo "Failed to Login";
	}
	if(isset($_POST['asGuest'])) {

		header('Location: generate_report.php');
	}


	?>