<?php
require_once('../mySQL_functions.php');

function delMedium($isbn) {
	$mysqli = openConnection();

	$sql = "DELETE
					FROM media
					WHERE isbn = '$isbn'";
					
	$result = realQuery($mysqli, $sql);
	closeConnection($mysqli);
	return $result;
}
