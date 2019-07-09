<?php

    ini_set ('log_errors', 'on'); //Logging errors
    
    header('Content-type: application/json');

    $response = array();

    session_start();

    require_once 'config.php';

    $inst_email = mysqli_real_escape_string($link, $_POST['instEmail']);
    $inst_password = mysqli_real_escape_string($link, $_POST['instPassword']); 

    $query = "SELECT `id`, `password` FROM `instructor` WHERE (`email`='$inst_email')";
    $execute_query = mysqli_query($link, $query);
    $get_row = mysqli_fetch_assoc($execute_query);

    $inst_id = $get_row['id'];
    $hashed_db_password = $get_row['password'];

    /*Comparing the entered password with the one in the database, and returning a boolean value.*/
    $isCorrectPassword = password_verify($inst_password, $hashed_db_password);

	// check for successful validation
    if (($execute_query) && ($isCorrectPassword)) {

        $_SESSION['inst_id'] = $inst_id;
		$response['status']  = 'success';
		$response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp;Details verified!';
    } else {
        $response['status']  = 'error'; // could not log in
        $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp;Email or password is incorrect. Please try again.';
    }

    mysqli_close ($link);
    echo json_encode($response);
?>