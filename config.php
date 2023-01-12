<?php
$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "**************";
$dbName = "student_portal";

$connection = mysqli_connect($dbServerName, $dbUserName,
        $dbPassword, $dbName);

if (!$connection){
    die("Unable to connect to database: ". mysqli_connect_error());
}
?>