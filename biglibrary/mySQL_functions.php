<?php

DEFINE('DBHOST', 'localhost');
DEFINE('DBUSER', 'root');
DEFINE('DBPASS', '');
DEFINE('DBNAME', 'cr10_ivan_zykov_biglibrary');

function openConnection () {
	return new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
}

function closeConnection (&$connection) {
	if (isset($connection)) {
		$connection->close();	
	}
}

//Check connection
function showConnectionStatus ($mysqli) {
	if ($mysqli->connect_error) {
		die('Connection failed: ' . $mysqli->connect_errno. ': ' . $mysqli->connect_error);
	} else {
		//echo "Connection live!<br>";
	}
}

function escapeString ($mysqli, $userInput) {
	return mysqli_real_escape_string($mysqli, $userInput);
}

function queryDatabase ($mysqli, $sql) {
	return $mysqli->query($sql);
}

function countRows ($result) {
	return mysqli_num_rows($result);
}

function fetchAllRows ($result) {
	return $result->fetch_all(MYSQLI_ASSOC);
}

function fetchOneRow ($result) {
	return $result->fetch_assoc();
}