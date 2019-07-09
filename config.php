<?php
    
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'toor');
    define('DB_NAME', 'openlearn');

    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if(!$link)
    {
        die ("Error " . mysqli_connect_errno() . ": " . mysqli_connect_error(). $PHP_EOL);
    }
?>
