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
// IF submit button is pressed

// Show view
require_once('../views/add_view.php');