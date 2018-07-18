<?php
$sql = "SELECT user_id, email, pass
						FROM users
						WHERE email = '$email'";

$result = $mysqli->query($sql);
$count = 0;

if (is_object($result)) { //Result has to have something
	$count = mysqli_num_rows($result);
	if($count != 0) {
		$row = $result->fetch_all(MYSQLI_ASSOC);
		//var_dump($row[0]['pass']);
	} else { //If more than one record in DB for such an email found
		$error = true;
		echo 'User with such email was not found!';
	}
}

