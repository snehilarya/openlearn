<!DOCTYPE html>
<html>
    <title>Success</title>
    <head>


<?php

    session_start();

    ini_set ('log_errors', 'on'); //Logging errors    

    require_once '../config.php';

    if ($_SESSION['inst_id']) {

        if( isset($_POST['courseName']) && isset($_POST['courseCategory']) && isset($_POST['courseInfo']) && !empty($_POST['courseName']) && !empty($_POST['courseCategory']) && !empty($_POST['courseInfo'])) {
        
                $course_id       =   uniqid();
                $course_name     =   mysqli_real_escape_string($link, $_POST['courseName']);
                $course_category =   mysqli_real_escape_string($link, $_POST['courseCategory']);
                $course_info     =   mysqli_real_escape_string($link, $_POST['courseInfo']);
                $inst_id         =   mysqli_real_escape_string($link, $_SESSION['inst_id']);

                $query = "INSERT INTO `courses` VALUES ('$course_id', '$course_name', '$course_category', '$course_info', '$inst_id') ";
                $execute_query = mysqli_query($link, $query);

                if($execute_query) {

                    echo "<p>Course created successfully!</p><p>Redirecting to course management page...</p>";
                    echo "<script type='text/javascript'>
                    window.setTimeout(function() {
                        window.location.href = 'course-management.php';
                    }, 3000);
                    </script>";
                }
                else
                {
                    echo ("There is some problem in adding data. Please go back, check, and retry.");
                    echo "<script type='text/javascript'>
                    window.setTimeout(function() {
                        window.location.href = 'create-course.php';
                    }, 3000);
                    </script>";
                }
        } else {
            echo "There is some error. Redirecting back...";
            echo "<script type='text/javascript'>
            window.setTimeout(function() {
                window.location.href = 'create-course.php';
            }, 3000);
            </script>";
        }

    } else {
        echo "<script type='text/javascript'>
            window.location.href = '../login.php';
        </script>";
    }

?>

</head>

<body>
</body>

</html>