<?php
    // SQL Variables for connection
        $servername = 'eu-cdbr-azure-north-d.cloudapp.net';
        $username = 'be98473f5ddb95';
        $password = '80a95351';
        $dbname = 'bucktestRGU';

    // Connect to DB
        $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Display any errors
        if(!$conn){ die("Connect.php: Connection failed: " . mysqli_error($conn));}

    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);
?>