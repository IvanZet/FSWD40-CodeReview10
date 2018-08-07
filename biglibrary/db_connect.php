<?php 

// Grab DB connection credentials
require_once('mySQL_functions.php');

$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

// Check connection
if ($mysqli->connect_error) {
	die('Connection failed: ' . $mysqli->connect_errno. ': ' . $mysqli->connect_error);
} else {
	//echo "Connection live!<br>";
}