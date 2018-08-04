<?php
require_once('../mySQL_functions.php');

function getDetails($isbn) {
	$mysqli = openConnection();

	$sql = "SELECT title, publish_date AS pub_year, img_link, short_description AS description, creators.creator_id AS creator_id, creators.first_name AS first_name, creators.last_name AS last_name, publishers.publisher_id AS pub_id, publishers.name AS pub_name, publishers.city AS pub_city, types.type_id AS type_id, types.name AS type_name
					FROM media
					INNER JOIN creators
						ON media.fk_creator_id = creators.creator_id
					INNER JOIN publishers
						ON media.fk_publisher_id = publishers.publisher_id
					INNER JOIN types
						ON media.fk_type_id = types.type_id
					WHERE media.isbn = $isbn";

	$result = queryDatabase($mysqli, $sql);
	$details = fetchOneRow($result);

	return $details;
}

function editMedium($isbn, $title, $year, $img, $description, $creatorId, $publisherId, $type) {
	$mysqli = openConnection();

	$sql = "UPDATE media
					SET
						title = '$title',
				    publish_date = $year,
				    img_link = '$img',
				    short_description = '$description',
				    fk_creator_id = '$creatorId',
				    fk_publisher_id = '$publisherId',
				    fk_type_id = '$type'
					WHERE isbn = '$isbn'";
					
	$result = realQuery($mysqli, $sql);
	return $result;
}
