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

// If submit button is pressed
if(isset($_POST['btn_edit'])) {
	
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

		// @todo Insert into DB

		if ($result) {
			echo 'Added new medium!';
			unset($title, $year, $img, $description, $creatorId, $publisherId, $type);
		} else {
			echo 'Failed to add new medium! Variable $result:<br>';
			var_dump($result);
		}

	} else {
		echo $errorMsg;
	}

}

// Get meduim details
$isbn = $_POST['isbn'];

// Get array of creators from DB
$creators = getCreators();

// Get array of publishers from DB
$publishers = getPublishers();

// Get array of types from DB
$types = getTypes();

// Show view
require_once('../views/edit_view.php');