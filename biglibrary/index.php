<?php
ob_start();
session_start();

// Redirect to login page
header('Location: controllers/index_controller.php');
exit;
?>