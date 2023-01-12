<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, intial-scale=1.0" />
        <title>Class Registry</title>

        <h1>Class Registry</h1>
        <?php
        require_once('header.php');
        require_once('functions.php');


        $fName = $_SESSION["userfname"];
        $lName = $_SESSION["userlname"];
        $email = $_SESSION["useremail"];
        

        ?>
        <button type="submit" name="submit">Python</button>
        <button type="submit" name="submit">C</button>
        <button type="submit" name="submit">MySQL</button>
   <!-- </head>
        <body> 
            <form action="register_for_class.inc.php" method= "POST">
                <input type="text" name="firstName" placeholder="First Name">
                <br>
                <input type="text" name="lastName" placeholder="Last Name">
                <br>
                <input type="text" name="studentEmail" placeholder="Email">
                <br>
                <input type="text" name="className" placeholder="Class Name">
                <br>
                <button type="submit" name="submit">Register</button>
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