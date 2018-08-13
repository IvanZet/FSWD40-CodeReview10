<!DOCTYPE html>
<html lang="en">
<head>
	<title>Big Library</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="index_controller.php">Big Library</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav">
		    	<?php if(isset($_SESSION['user'])) { ?>
					<a class="nav-item nav-link" href="../big_list.php">Big List</a>
		      <a class="nav-item nav-link" href="../log_out.php?logout">Log Out</a>
					<?php } else { ?>
		      <a class="nav-item nav-link active" href="index_controller.php">Sign In</a>
		      <a class="nav-item nav-link" href="../register.php">Sign Up</a>
		    	<?php } ?>
		      <!--<a class="nav-item nav-link disabled" href="#">Disabled</a>-->
		    </div>
		  </div>
		</nav>
	</header>