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
require_once('../models/details_model.php');

// Query DB for the details
$details = getDetails($isbn);

// Show view
require_once('../views/details_view.php');
