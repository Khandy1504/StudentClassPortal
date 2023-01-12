<?php
if (isset($_POST["submit"])){

    $fName = $_POST["firstName"];
    $lName = $_POST["lastName"];
    $email = $_POST["studentEmail"];
    $className = $_POST["className"];

    require_once('config.php');
    require_once('functions.php');

    if (emptyInputLogin($fName, $lName, $email, $className) !== false){
        header("location: ../student_portal/cancallation.php?error=emptyinput");
        exit();
    }

    cancelClass ($connection, $fName, $lName, $email, $className);
}
else{
    header("location: ../student_portal/cancellation.php");
    exit();
}