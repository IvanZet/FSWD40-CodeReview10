<?php
require_once('../mySQL_functions.php');

function addMedium($title, $year, $img, $description, $creatorId, $publisherId, $type) {
	$mysqli = openConnection();

	$sql = "INSERT INTO media (title, publish_date, img_link, short_description, fk_creator_id, fk_publisher_id, fk_type_id)
					VALUES ('$title', '$year', '$img', '$description', '$creatorId', '$publisherId', '$type')";
					
	$result = realQuery($mysqli, $sql);
	closeConnection($mysqli);
	
	return $result;
}
