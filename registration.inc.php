<?php

if(isset($_POST["submit"])){

    $userEmail = $_POST['userEmail'];
    $userPass = $_POST['userPass'];
    $first = $_POST['first'];
    $last = $_POST['last'];
    $userAdd = $_POST['userAdd'];
    $userPhone = $_POST['userPhone'];

    require_once('config.php');
    require_once('functions.php');

    if (emptyInputSignup($userEmail, $userPass, $first, $last, $userAdd, $userPhone) !== false){
        header("location: ../student_portal/registration.php?error=invalidemail");
        exit();
    }
    if (emailExists($connection, $userEmail) !== false){
        header("location: ../student_portal/registration.php?error=emailtaken");
        exit();
    }

    createUser($connection, $userEmail, $userPass, $first, $last, $userAdd, $userPhone);

    header("location: ../student_portal/index.php?register=success");
}
else{
    header("location: ../student_portal/registration.php");
    exit();
}
?>