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
        <title>Available Classes</title>

        <h1>Available Classes</h1>
            
    </head>
    <body>
        <h2>Python</h2>
    <form method="post">
        <button type="submit" name="python_fall"> Fall Sign Up</button> 
        <br>
        <button type="submit" name="python_winter">Winter Sign Up</button>
        <br>
        <button type="submit" name="python_spring">Spring Sign Up</button> 
        <br>
        <button type="submit" name="python_summer">Summer Sign Up</button> 
        <br>
        <p>
            This course will introduce students to the fundamentals of computer programming. 
            Students will learn fundamentals of computer programming including primitive data 
            types, expressions, control statements, functions, and arrays. Students in this 
            course will be using Python programing language. Python is a widely used high-level, 
            general-purpose, interpreted, dynamic programming language.
        
        </p>
        <h2>C</h2>
        <button type="submit" name="c_fall"> Fall Sign Up</button> 
        <br>
        <button type="submit" name="c_winter">Winter Sign Up</button>
        <br>
        <button type="submit" name="c_spring">Spring Sign Up</button> 
        <br>
        <button type="submit" name="c_summer">Summer Sign Up</button> 
        <br>
        <p>
            This course teaches structured high-level language C programming using the C. 
            Topics covered include basic input and output, declaration and use of variables, 
            control statements, application of functions, and arrays. Students will deploy 
            applications using C programming language.
        
        </p>
        <h2>MySQL</h2>
        <button type="submit" name="my_sql_fall"> Fall Sign Up</button> 
        <br>
        <button type="submit" name="my_sql_winter">Winter Sign Up</button>
        <br>
        <button type="submit" name="my_sql_spring">Spring Sign Up</button> 
        <br>
        <button type="submit" name="my_sql_summer">Summer Sign Up</button> 
        <br>
        <p>
            This course introduces the students to fundamentals of database design, modeling, and 
            relational databases. Students will utilize the concepts to construct and test a database 
            and associated application components. The developments of efficient database application 
            systems require an understanding of fundamentals of database management system.
        
        </p>
    </form>    
       
        <?php
            $fName = $_SESSION["userfname"];
            $lName = $_SESSION["userlname"];
            $email = $_SESSION["useremail"];

            if(isset($_POST['python_fall'])){
                $class = "python_fall";
                addStudent($connection, $fName, $lName, $email, $class);
            }
            else if(isset($_POST['python_winter'])){
                $class = "python_winter";
                addStudent($connection, $fName, $lName, $email, $class);
            }
            else if(isset($_POST['python_spring'])){
                $class = "python_spring";
                addStudent($connection, $fName, $lName, $email, $class);
            }
            else if(isset($_POST['python_summer'])){
                $class = "python_summer";
                addStudent($connection, $fName, $lName, $email, $class);
            }
            else if(isset($_POST['c_fall'])){
                $class = "c_fall";
                addStudent($connection, $fName, $lName, $email, $class);
            }
            else if(isset($_POST['c_winter'])){
                $class = "c_winter";
                addStudent($connection, $fName, $lName, $email, $class);
            }
            else if(isset($_POST['c_spring'])){
                $class = "c_spring";
                addStudent($connection, $fName, $lName, $email, $class);
            }
            else if(isset($_POST['c_summer'])){
                $class = "c_summer";
                addStudent($connection, $fName, $lName, $email, $class);
            }
            else if(isset($_POST['my_sql_fall'])){
                $class = "my_sql_fall";
                addStudent($connection, $fName, $lName, $email, $class);
            }
            else if(isset($_POST['my_sql_winter'])){
                $class = "my_sql_winter";
                addStudent($connection, $fName, $lName, $email, $class);
            }else if(isset($_POST['my_sql_spring'])){
                $class = "my_sql_spring";
                addStudent($connection, $fName, $lName, $email, $class);
            }else if(isset($_POST['my_sql_summer'])){
                $class = "my_sql_summer";
                addStudent($connection, $fName, $lName, $email, $class);
            }
        ?>    
    </body>    
   
        