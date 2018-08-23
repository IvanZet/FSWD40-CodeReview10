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
		$errorMsg .= 'Your name should be at lest 3 letter long! ';
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
		$errorMsg .= 'Your last name should be at lest 3 letter long! ';
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
		echo 'No errors! ';
		$sql = "INSERT INTO users (first_name, last_name, email, pass)
						VALUES 						('$first_name', '$last_name', '$email', '$pass')";
		$result = $mysqli->real_query($sql);

		if ($result) {
			echo 'Registered as new user! You may sing in.';
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
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="controllers/index_controller.php">Big Library</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav">
		    	<a class="nav-item nav-link" href="controllers/index_controller.php">Sign In</a>
		      <a class="nav-item nav-link active" href="register.php">Sign Up<span class="sr-only">(current)</span></a>
		    </div>
		  </div>
		</nav>
	</header>
	<main class="small_main">
		<form class="form-signin" action="register.php" method="post" autocomplete="on">
			<div class="form-group">
		    <label for="first_name">First name</label>
		    <input type="text" name="first_name" id="first_name" class="form-control" aria-describedby="emailHelp" placeholder="Enter first name">
		  </div>
		  <!-- <form action="register.php" method="post" autocomplete="on"> -->
			<div class="form-group">
		    <label for="last_name">Last name</label>
		    <input type="text" name="last_name" id="last_name" class="form-control" aria-describedby="emailHelp" placeholder="Enter last name">
		  </div>
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
		  </div>
		  <div class="form-group">
		    <label for="pass">Password</label>
		    <input type="password" name="pass" class="form-control" id="pass" placeholder="Enter password">
		  </div>
		  <button type="submit" class="btn btn-primary" name="btn_singup">Submit</button>
		</form>
	</main>

	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
</body>

<footer class="container">
	<p class="text-center mt-5 mb-3 text-muted">&copy; Ivan Zykov, 2018</p>
</footer>

</html>