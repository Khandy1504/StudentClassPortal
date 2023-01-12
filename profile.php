<?php
require_once('header.php');
require_once('config.php');
require_once('functions.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, intial-scale=1.0" />
        <title>Profile</title>

        <p>
            <h1>Profile</h>
        
        </p>
</head>
<body> 
    Registered Classes:
    <br>
    <?php
        classList($connection);
    ?>
    <br>
    <a href="cancellation.php">
            <button>Cancel Class Form</button>
        </a>
    
</body>
</html>

