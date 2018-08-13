<?php 
ob_start();
session_start();

// If user not logged in, redirect to login page
if(!isset($_SESSION['user'])) {
	header('Location: index_controller.php');
	exit;
}

// Get ID of the medium
$isbn = $_GET['isbn'];

// Include model
require_once('../models/delete_model.php');

// Delete the medium
$result = delMedium($isbn);

// Show messages
$deleted = false;
if ($result) {
	$deleted = true;
} else {
	echo 'Failed to delete medium! Dumping variable $result:<br>';
	var_dump($result);
}

// Show view
header("Location: ../big_list.php?deleted=$deleted");
exit;