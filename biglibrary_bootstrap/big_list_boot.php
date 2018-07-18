<?php 
ob_start();
session_start();

//If user not logged in, redirect to index_boot.php
if(!isset($_SESSION['user'])) {
	header('Location: index_boot.php');
	exit;
}

require_once 'db_connect.php';

$sql  = "SELECT title, publish_date, creators.first_name AS first_name, creators.last_name AS last_name, media.img_link AS img_link, fk_user_id
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
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="index_boot.php">Big Library</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav">
		    	<a class="nav-item nav-link" href="index_boot.php">Sign in</a>
		      <a class="nav-item nav-link" href="register_boot.php">Sign Up</a>
		      <a class="nav-item nav-link active" href="big_list_boot.php">Big List<span class="sr-only">(current)</span></a>
		      <a class="nav-item nav-link" href="log_out_boot.php?logout">Log Out</a>
		      <!--<a class="nav-item nav-link disabled" href="#">Disabled</a>-->
		    </div>
		  </div>
		</nav>
	</header>
	<table>
		<main>
				<div class="container">
					<div class="row">
						<?php
						//Show all the media in the library
						foreach ($media as $medium) {?>
							<div class="card" style="width: 18rem;">
						  <img class="card-img-top" src="<?php echo $medium['img_link']; ?>" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title"><?php echo $medium['title']; ?></h5>
						    <p class="card-text"><?php echo $medium['first_name'] . " " . $medium['last_name']; ?></p>
						  </div>
						</div>
						<?php
						}
						?>	
					</div>
				</div>
				
			</tbody>
		</table>
	</main>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>