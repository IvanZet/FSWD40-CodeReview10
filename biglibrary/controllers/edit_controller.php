<?php 
ob_start();
session_start();

// If user not logged in, redirect to login page
if(!isset($_SESSION['user'])) {
	header('Location: index_controller.php');
	exit;
}

$error = false;
$errorMsg = '';

// Include model
require_once('../models/edit_model.php');
require_once('../models/common_model.php');

// Get medium id to edit
if (!isset($_POST['btn_edit'])) {
	$isbn = $_GET['isbn'];
}

// If submit button is pressed, try tp update medium
if(isset($_POST['btn_edit'])) {
	
	$isbn = $_POST['isbn'];

	// Get and clear input
	$title = readField($_POST['title']);
	$creatorId = readField($_POST['creator']);
	$description = readField($_POST['descr']);
	$img = readField($_POST['img']);
	$year = readField($_POST['year']);
	$publisherId = readField($_POST['publisher']);
	$type = readField($_POST['type']);
	/*var_dump($title, $cratorId, $description, $img, $year, $publisherId, $type);*/

	require_once('common_controller.php');

	// Check title
	checkTitle($title, $error, $errorMsg);

	// Check creator
	checkSelection($creatorId, $error, $errorMsg, 'creator');

	// Check description
	checkDescription($description, $error, $errorMsg);

	// Check image URL
	checkImg($img, $error, $errorMsg);

	// Check year
	checkYear($year, $error, $errorMsg);

	// Check publisher
	checkSelection($creatorId, $error, $errorMsg, 'publisher');

	// Check type
	checkSelection($creatorId, $error, $errorMsg, 'type');

	// Save to DB
	if (!$error) {
		//echo "No errors) Trying to insert into DB. ";

		// Insert into DB
		$result = editMedium($isbn, $title, $year, $img, $description, $creatorId, $publisherId, $type);

		if ($result) {
			echo 'Edited medium!';
			unset($title, $year, $img, $description, $creatorId, $publisherId, $type);
		} else {
			echo 'Failed to edit medium! Variable $result:<br>';
			var_dump($result);
		}

	} else {
		echo "Error!<br>";
		echo $errorMsg;
	}

}

// Get all creators from DB
$creators = getCreators();

// Get all publishers from DB
$publishers = getPublishers();

// Get all types from DB
$types = getTypes();

// Get meduim details
$details = getDetails($isbn);

// Show view
require_once('../views/edit_view.php');