<!DOCTYPE html>
<html>
<title>OpenLearn</title>
<head>
    
<?php

    ini_set ('log_errors', 'on'); //Logging errors
    
    session_start();

    if(isset($_SESSION['inst_id'])) {
        unset($_SESSION['inst_id']);
        echo "<p>You have been successfully logged out!</p><p>Redirecting to login page in 5 seconds...</p>";
        echo "<script type='text/javascript'>
                    window.setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 3000);
            </script>";
    }
    else {
        echo "<p>You are already logged out! Redirecting to login page in 4 seconds...</p>";
        echo "<script type='text/javascript'>
                    window.setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 4000);
               </script>";
    }
?>

</head>
</html>