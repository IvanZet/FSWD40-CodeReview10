<?php 
ob_start();
session_start();

// If user not logged in, redirect to login page
if(!isset($_SESSION['user'])) {
	header('Location: index_controller.php');
	exit;
}

// Include model
require_once('../models/add_model.php');

// Execute add on DB
$error = false;
$errorMsg = '';

// If submit button is pressed
if(isset($_POST['btn_add'])) {
	
	// Get and clear input
	$title = readField($_POST['title']);
	$creatorId = readField($_POST['creator']);
	$description = readField($_POST['descr']);
	$img = readField($_POST['img']);
	$year = readField($_POST['year']);
	$publisherId = readField($_POST['publisher']);
	$type = readField($_POST['type']);
	/*var_dump($title, $cratorId, $description, $img, $year, $publisherId, $type);*/

	// Check title
	if (empty($title)) {
		$error = true;
		$errorMsg .= 'Please enter title! ';
	} else if (strlen($title) < 3) {
		$error = true;
		$errorMsg .= 'Title should be at least 3 letters long! ';
	} else if (!preg_match("/^[A-Za-z ]+$/", $title)) {
		$error = true;
		$errorMsg .= 'Title must contain alphabets and spaces only! ';
	}

	// Check creator
	if ($creatorId == -1) {
		$error = true;
		$errorMsg .= 'Please select creator! ';
	}

	// Check description
	if (empty($description)) {
		$error = true;
		$errorMsg .= 'Please enter description! ';
	} else if (strlen($description) < 10) {
		$error = true;
		$errorMsg .= 'Description should be at least 10 letters long! ';
	}

	// Check image URL
	if(empty($img)) {
		$error = true;
		$errorMsg .= 'Please enter image URL! ';
	} else if (!filter_var($img, FILTER_VALIDATE_URL)) {
		$error = true;
		$errorMsg .= 'Please enter a valid URL! ';
	}

	// Check year
	if (empty($year)) {
		$error = true;
		$errorMsg .= 'Please enter publication year! ';
	} else if (!is_numeric($year)) {
		$error = true;
		$errorMsg .= 'Please enter year as a number! ';
	}

	// Check publisher
	if ($publisherId == -1) {
		$error = true;
		$errorMsg .= 'Please select publisher! ';
	}

	// Check type
	if ($type == -1) {
		$error = true;
		$errorMsg .= 'Please select type! ';
	}

	// Save to DB
	if (!$error) {
		echo "No errors)";
	} else {
		echo $errorMsg;
	}

	// Throw successs message
}

//Get array of creators from DB
$creators = getCreators();

//Get array of publishers from DB
$publishers = getPublishers();

//Get array of types from DB
$types = getTypes();

// Show view
require_once('../views/add_view.php');