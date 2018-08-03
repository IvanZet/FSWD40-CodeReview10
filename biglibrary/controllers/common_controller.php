<?php
/**
 * Functions used in multiple controllers
 */
function checkTitle($title, &$error, &$errorMsg) {
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
}

function checkSelection($creatorId, &$error, &$errorMsg, $field) {
	if ($creatorId == -1) {
		$error = true;
		$errorMsg .= "Please select $field! ";
	}
}

function checkDescription($description, &$error, &$errorMsg) {
	if (empty($description)) {
		$error = true;
		$errorMsg .= 'Please enter description! ';
	} else if (strlen($description) < 10) {
		$error = true;
		$errorMsg .= 'Description should be at least 10 letters long! ';
	}
}

function checkImg($img, &$error, &$errorMsg) {
	if(empty($img)) {
		$error = true;
		$errorMsg .= 'Please enter image URL! ';
	} else if (!filter_var($img, FILTER_VALIDATE_URL)) {
		$error = true;
		$errorMsg .= 'Please enter a valid URL! ';
	}
}

function checkYear($year, &$error, &$errorMsg) {
	if (empty($year)) {
		$error = true;
		$errorMsg .= 'Please enter publication year! ';
	} else if (!is_numeric($year)) {
		$error = true;
		$errorMsg .= 'Please enter year as a number! ';
	}
}