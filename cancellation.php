<?php
require_once('config.php');
require_once('header.php');
require_once('functions.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, intial-scale=1.0" />
        <title>Class Cancellation</title>

        <h1>Class Cancallation</h>
    
    </head>

        <body>
            <h1>Please fill out the fields below to cancel your class.
                <br>
                Please fill in the class exactly as shown on your profile.
            </h1>
            <form action="cancellation.inc.php" method="POST">
                <input type="text" name="firstName" placeholder="First Name">
                <br>
                <input type="text" name="lastName" placeholder="Last Name">
                <br>
                <input type="text" name="studentEmail" placeholder="Email">
                <br>
                <input type="text" name="className" placeholder="Class Name">
                <br>
                <button type="submit" name="submit">Cancel Class</button>
            </form>
        </body>
        <?php
        if (isset($_GET["error"])){
            if ($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields.</p>";
            }
        }
        ?>
</html>     