<?php 
ob_start();
session_start();

//If user not logged in, redirect to index_boot.php
if(!isset($_SESSION['user'])) {
	header('Location: index_boot.php');
	exit;
}

require_once 'db_connect.php';

$sql  = "SELECT title, publish_date, creators.first_name AS first_name, creators.last_name AS last_name, fk_user_id
				 FROM media
				 LEFT JOIN creators
				 		ON media.fk_creator_id = creators.creator_id
				 ORDER BY title";

$result = $mysqli->query($sql);

//Check SQL query
if(!$result) {
	echo "<p>My SQL Eror no: " . $mysqli->connect_errno . "</p>";
	echo "<p>My SQL Error: " . $mysqli->connect_error . "</p>";
	echo "<p>SQL statement: " . $sql . "</p>";
	echo "<p>MySQL affected rows: " . $mysqli->affected_rows ."</p>";
} else {
	//Fetch the SQL output as sccociative array
	$media = $result->fetch_all(MYSQLI_ASSOC);
	//var_dump($media);
}

$result->free();
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Big List</title>
</head>
<body>
	<a href="log_out_boot.php?logout" title=""><button type="button" name="log_out">Log out</button></a>
	<table>
		<caption style="font-size: 2em">Big List</caption>
		<thead>
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Year</th>
				<th>Availability</th>
			</tr>
		</thead>
		<tbody>
			<?php
			//Show all the media in the library
			foreach ($media as $medium) {?>
				<tr>
					<td><?php echo $medium['title'] ?></td>
					<td><?php echo $medium['first_name'] . " " . $medium['last_name'] ?></td>
					<td><?php echo $medium['publish_date'] ?></td>
					<td><?php if(is_null($medium['fk_user_id'])) {
											echo 'Available';
											} else {
												echo 'Booked';
											}
							?></td>
				</tr>
			<?php
			}
			?>
			
		</tbody>
	</table>
</body>
</html>