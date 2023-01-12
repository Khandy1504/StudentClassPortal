<?php
if (isset($_POST["submit"])){

    $userEmail = $_POST["userEmail"];
    $userPass = $_POST["userPass"];

    require_once('config.php');
    require_once('functions.php');

    if (emptyInputLogin($userEmail, $userPass) !== false){
        header("location: ../student_portal/login.php?error=emptyinput");
        exit();
    }

    loginUser ($connection, $userEmail, $userPass);
}
else{
    header("location: ../student_portal/login.php");
    exit();
}