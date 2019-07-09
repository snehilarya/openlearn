<?php
    
    header('Content-type: application/json');
  
    require_once '../config.php';
  
    $response = array();

    if(!empty($_POST))
    {
        $output = '';
        $video_title = mysqli_real_escape_string($link, $_POST["video_title"]);  
        $video_link = mysqli_real_escape_string($link, $_POST["video_link"]);  
        $course_id = mysqli_real_escape_string($link, $_POST["course_id"]);
        
        $query = "INSERT INTO course_content VALUES('$course_id', '$video_title', '$video_link')";
        $stmt =  mysqli_query($link, $query);
        
        if ($stmt) {
			$response['status'] = 'success';
			$response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp;Inserted successfully!';
        } else {
            $response['status'] = 'error'; // could not register
			$response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Could not insert. Please try again later.';
        }
        
        echo json_encode($response);
}
?>