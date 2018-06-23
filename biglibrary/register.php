<?php
ob_start();
session_start();

//Check if user has already sugned in
if(isset($_SESSION['user'])) {
	header('Location: big_list.php');
	exit;
}

//Start creating new user
require_once 'db_connect.php';

$error = false;
$errorMsg = '';
if(isset($_POST['btn_singup'])) {
	//Read input fields
	$first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['pass']);

	//Check first name
	if (empty($first_name)) {
		$error = true;
		$errorMsg .= 'Please enter your first name! ';
	} else if (strlen($first_name) < 3) {
		$error = true;
		$errorMsg .= 'Your name should be at lest 3 letters long! ';
	} else if (!preg_match("/^[A-Za-z ]+$/", $first_name)) {
		$error = true;
		$errorMsg .= 'First name must contain alphabets and spaces only! ';
	}

	//Check last name
	if (empty($last_name)) {
		$error = true;
		$errorMsg .= 'Please enter your last name! ';
	} else if (strlen($last_name) < 3) {
		$error = true;
		$errorMsg .= 'Your last name should be at lest 3 letters long! ';
	} else if (!preg_match("/^[A-Za-z ]+$/", $last_name)) {
		$error = true;
		$errorMsg .= 'First last name must contain alphabets and spaces only! ';
	}

	//Check email
	if(empty($email)) {
		$error = true;
		$errorMsg .= 'Please enter your email! ';
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$errorMsg .= 'Please enter a valid email! ';
	} else { //Check if email aready registered
		$sql = "SELECT email
						FROM users
						WHERE email = '$email'";
		$result = $mysqli->query($sql);
		$count = 0;
		
		if (is_object($result)) {
			$count = mysqli_num_rows($result);

			if ($count == 0) {
				$row = $result->fetch_all(MYSQLI_ASSOC);
			} else {
				$error = true;
				$errorMsg .= 'Provided email was already registered. Pick another email! ';
			}
		} else {
			$error = true;
			$errorMsg .= 'Error: returned SQL statement is not an object! ';
		}
	}

	//Validate password
	if (empty($pass)) {
		$error = true;
		$errorMsg .= 'Please enter a desired password! ';
	} else if (strlen($pass) < 6) {
		$error = true;
		$errorMsg .= 'Passwordd should be at least 6 characters long! ';
	}

	//Hash pass for security
	$pass = hash('sha256', $pass);

	//Check for errors and save to DB
	if(!$error) {
		echo 'No errors!';
		$sql = "INSERT INTO users (first_name, last_name, email, pass)
						VALUES 						('$first_name', '$last_name', '$email', '$pass')";
		$result = $mysqli->real_query($sql);

		if ($result) {
			echo 'Registered as a new user! You may login.';
			unset($first_name, $last_name, $email, $pass);
		} else {
			echo 'Something went wrong, try again!';
			var_dump($result);
		}
	} else {
		echo $errorMsg;
	}
}

//Free $result, close $mysqli
if (isset($result)) {
	unset($result);
}
$mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<style type="text/css">
		fieldset {
			margin: auto;
			margin-top: 100px;
			width: 50%;
		}
		table tr th td {
			padding-top: 20px;
		}
	</style>
</head>
<body>
	<a href="index.php" title=""><button type="button">Back to Sign In</button></a>
	<fieldset>
		<legend>Fill in the form to register</legend>
			<table>
				<form action="register.php" method="post" autocomplete="on">
					<tr>
						<th>First name:</th>
						<td><input type="text" name="first_name"></td>
					</tr>
					<tr>
						<th>Last name:</th>
						<td><input type="text" name="last_name"></td>
					</tr>
					<tr>
						<th>E-mail:</th>
						<td><input type="text" name="email"></td>
					</tr>
					<tr>
						<th>Password:</th>
						<td><input type="text" name="pass"></td>
					</tr>
					<tr>
						<td><button type="submit" name="btn_singup">Sign Up</button></td>
					</tr>
			</table>
		</form>
	</fieldset>
</body>
</html>