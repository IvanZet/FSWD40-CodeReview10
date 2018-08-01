<?php 
ob_start();
session_start();

if(!isset($_SESSION['user'])) {
	header("Location: controllers/index_controller.php");
} else {
	header("Location: big_list.php");
}

if(isset($_GET['logout'])) {
	unset($_SESSION['user']);
	session_unset();
	session_destroy();
	header("Location: controllers/index_controller.php");
}
exit;
?>