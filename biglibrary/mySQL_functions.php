<?php

DEFINE('DBHOST', 'e96325-mysql.services.easyname.eu'); // localhost // e96325-mysql.services.easyname.eu
DEFINE('DBUSER', 'u152873db1'); // root // u152873db1
DEFINE('DBPASS', 'Fr1no807'); // '' // Fr1no807
DEFINE('DBNAME', 'u152873db1'); // 'cr10_ivan_zykov_biglibrary' // u152873db1

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

function realQuery($mysqli, $sql) {
	return $mysqli->real_query($sql);
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