<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, intial-scale=1.0" />
        <title>Registration</title>

        <h1>Student Registration</h1>

    </head>
<body>
    <form action="register.inc.php" method="POST">
        <input type="text" name="userEmail" placeholder="Email">
        <br>
        <input type="password" name="userPass" placeholder="Password">
        <br>
        <input type="text" name="first" placeholder="First Name">
        <br>
        <input type="text" name="last" placeholder="Last Name">
        <br>
        <input type="text" name="userAdd" placeholder="Address">
        <br>
        <input type="text" name="userPhone" placeholder="Phone Number">
        <br>
        <button type="submit" name="submit">Register</button>
    </form>
</body>    

<?php
if (isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
        echo "<p>Fill in all fields.</p>";
    }
    else if ($_GET["error"] == "invalidemail"){
        echo "<p>Choose a proper email.</p>";
    }
    else if ($_GET["error"] == "emailtaken"){
        echo "<p>Email taken.</p>";
    }
    else if ($_GET["error"] == "none"){
        echo "<p>You have successfully signed up.</p>";
        header("location: ../student_portal/");
    }
}
?>
</html>