<?php
require_once('../mySQL_functions.php');

function getDetails($isbn) {
	$mysqli = openConnection();

	$sql = "SELECT title, publish_date, img_link, short_description, creators.first_name AS first_name, creators.last_name AS last_name, publishers.name AS pub_name, publishers.street AS pub_street, publishers.house_num AS pub_house, publishers.postal_code AS pub_postalCode, publishers.city AS pub_city, publishers.country AS pub_country, types.name AS type
					FROM media
					INNER JOIN creators
						ON media.fk_creator_id = creators.creator_id
					INNER JOIN publishers
						ON media.fk_publisher_id = publishers.publisher_id
					INNER JOIN types
						ON media.fk_type_id = types.type_id
					WHERE isbn = $isbn";

	$result = queryDatabase($mysqli, $sql);
	$details = fetchOneRow($result);
	closeConnection($mysqli);

	return $details;
}