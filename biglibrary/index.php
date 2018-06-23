<?php 
ob_start();
session_start();

/*unset($_SESSION['user']);
session_unset();
session_destroy();
session_start();*/

require_once('db_connect.php');

//If user is already ligged in, redirect to big_list.php
if(isset($_SESSION['user'])) {
	header('Location: big_list.php');
	exit;
}

//Attemt to login user
$error = false;
$errorMsg = '';

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
		var_dump($pass);

		$sql = "SELECT user_id, email, pass
						FROM users
						WHERE email = '$email'";
		$result = $mysqli->query($sql);
		$count = 0;
		if (is_object($result)) { //Result has to have sometning
			$count = mysqli_num_rows($result);
			if($count != 0) {
				$row = $result->fetch_all(MYSQLI_ASSOC);
				//var_dump($row[0]['pass']);
				if ($count == 1 && $row[0]['pass'] == $pass) {//Single user found and passwords match
					$_SESSION['user'] = $row[0]['user_id'];
					header("Location: big_list.php");
				} else { //If passwords not match
					echo 'Incorrect credentials, try again!';
				}
			} else { //If more than one record in DB for such an email found
				echo 'User with such email was not found!';
			}
		} else { //If result is not an object
			echo 'User with such email was not found!';
		}
	} else { //If error no/invalid email or no passward given
		echo $errorMsg;
	}
}

if (isset($result)) {
	$result->free();
}
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
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
	<a href="register.php" title=""><button type="button">Sign Up</button></a>
	<fieldset>
		<legend>Sign In</legend>
		<form action="index.php" method="post">
			<table>
				<tr>
					<th>E-mail: </th>
					<td><input type="text" name="email"></td>
				</tr>
				<tr>
					<th>Password: </th>
					<td><input type="text" name="pass"></td>
				</tr>
				<tr>
					<td><button type="sumbit" name="btn_login">Sign In</button></td>
				</tr>
			</table>
		</form>
	</fieldset>
</body>
</html>