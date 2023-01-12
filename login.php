<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, intial-scale=1.0" />
        <title>Login</title>

        <h1>Student Login</h>
        <?php
        require_once('header.php');
        ?>
        </h>
        <body>
            <form action="login.inc.php" method="POST">
                <input type="text" name="userEmail" placeholder="Email">
                <br>
                <input type="password" name="userPass" placeholder="Password">
                <br>
                <button type="submit" name="submit">Login</button>
            </form>
        </body>    

        <?php
        if (isset($_GET["error"])){
            if ($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields.</p>";
            }
            else if ($_GET["error"] == "invalidlogin"){
                echo "<p>Incorrect login.</p>";
            }
        }
        ?>
        </html>