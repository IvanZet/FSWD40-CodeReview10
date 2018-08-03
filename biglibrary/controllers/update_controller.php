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
require_once('../models/update_model.php');

// Execute update on DB
// IF submit button is pressed

// Show view
require_once('../views/update_view.php');