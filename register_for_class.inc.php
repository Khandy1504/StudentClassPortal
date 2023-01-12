<?php 
if (isset($_POST["submit"])){

    $fName = $_POST["firstName"];
    $lName = $_POST["lastName"];
    $email = $_POST["studentEmail"];
    $class = $_POST["className"];

    require_once('config.php');
    require_once('functions.php');
    require_once('header.php');

    addStudent($connection, $fName, $lName, $email, $class);
}
else{
    header("location: ../student_portal/register_for_class.php");
    exit();
}