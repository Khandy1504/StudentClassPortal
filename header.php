<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, intial-scale=1.0" />
        <title>Student Portal</title>

        <p>
            
        <?php
        if (isset($_SESSION["useremail"])){
            echo "<a href='profile.php'>Profile</a>";
            echo " ";
            echo "<a href='class_availability.php'>Available Classes</a>";
            echo " ";
            echo "<a href='logout.php'>Logout</a>";
        }
        else{
            echo "<a href='login.php'>Login</a>";
            echo " ";
            echo "<a href='registration.php'>Registration</a>";
        }
        ?>
        </p>
        </head>
        </html>