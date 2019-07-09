<?php

	require_once 'config.php';

	//To be removed later:
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
	//-----------------------
	if (isset($_REQUEST['email']) && !empty($_REQUEST['email'])) {
		
		$email = trim($_REQUEST['email']);
		$email = strip_tags($email);
		
		$query = "SELECT email FROM instructor WHERE email='$email'";
		$stmt = mysqli_query ($link, $query);
		
		if (mysqli_num_rows($stmt) > 0) {
			echo 'false'; // email already taken
		} else {
			echo 'true'; 
		}
	}

?>