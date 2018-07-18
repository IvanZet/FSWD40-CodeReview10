<?php 
ob_start();
session_start();

//If user is already ligged in, redirect to big_list_boot.php
if(isset($_SESSION['user'])) {
	header('Location: big_list_boot.php');
	exit;
}

//Attemt to login user
$error = false;
$errorMsg = '';

//Establish DB connection
require_once('db_connect.php');

if (isset($_POST['btn_login'])) { //If login button was pushed
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['pass']);

	if (empty($email)) {
		$error = true;
		$errorMsg .= 'Please enter email!';
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$errorMsg .= 'Pleas enter a valid email!';
		}

	if (empty($pass)) {
		$error = true;
		$errorMsg .= ' Please enter password!';
	}

	//If user input email and pass, continue to login
	if (!$error) {
		$pass = hash('sha256', $pass);
		//echo hash('sha256', '123456');
		//var_dump($pass);

		//Check that user is registered
		require_once('index_model.php');

		//contunue login
		if (!$error) {
			if ($count == 1 && $row[0]['pass'] == $pass) {//Single user found and passwords match
				$_SESSION['user'] = $row[0]['user_id'];
				header("Location: big_list_boot.php");
			} else { //If passwords not match
				echo 'Incorrect credentials, try again!';
			}
		} //else is missing because it was given in index_model.php
	} else { //If result is not an object
		echo $errorMsg;
	}
}

if (isset($result)) {
	$result->free();
}
if (isset($mysqli)) {
	$mysqli->close();	
}

//Show HTML
require_once('index_view.php');