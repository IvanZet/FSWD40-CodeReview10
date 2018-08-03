<?php
require_once('../mySQL_functions.php');

function getCreators() {
	$mysqli = openConnection();

	$sql = "SELECT creator_id, first_name, last_name
					FROM creators";

	$result = queryDatabase($mysqli, $sql);
	$creators = fetchAllRows($result);
	closeConnection($mysqli);

	return $creators;
}

function getPublishers() {
	$mysqli = openConnection();

	$sql = "SELECT publisher_id, name, city
					FROM publishers";

	$result = queryDatabase($mysqli, $sql);
	$publishers = fetchAllRows($result);
	closeConnection($mysqli);

	return $publishers;
}

function getTypes() {
	$mysqli = openConnection();

	$sql = "SELECT type_id, name
					FROM types";

	$result = queryDatabase($mysqli, $sql);
	$types = fetchAllRows($result);
	closeConnection($mysqli);

	return $types;
}

function readField($field) {
 $mysqli = openConnection();
 $value = mysqli_real_escape_string($mysqli, $field);
 closeConnection($mysqli);
 
 return $value;
}

function addMedium($title, $year, $img, $description, $creatorId, $publisherId, $type) {
	$mysqli = openConnection();

	$sql = "INSERT INTO media (title, publish_date, img_link, short_description, fk_creator_id, fk_publisher_id, fk_type_id)
					VALUES ('$title', '$year', '$img', '$description', '$creatorId', '$publisherId', '$type')";
					
	$result = realQuery($mysqli, $sql);
	return $result;
}