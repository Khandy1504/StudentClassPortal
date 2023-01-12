
<?php

function emptyInputSignup($userEmail, $userPass, $first, $last, $userAdd, $userPhone){
    $result;
    if (empty($userEmail) || empty($userPass) || empty($first) ||empty($last)
     ||empty($userAdd) ||empty($userPhone)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($userEmail){
    $result;
    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function createUser($connection, $userEmail, $userPass, $first, $last, $userAdd, $userPhone){
        
    $sql = "INSERT INTO student_info (email, user_password, firstName, lastName, userAddress,
    phone)
    VALUES ('$userEmail', '$userPass', '$first', '$last', '$userAdd', '$userPhone');";

    mysqli_query($connection, $sql);
    $fullName = $first."_".$last;
    createUserTbl($connection, $fullName);

    header("location: ../student_portal/registration.php?error=none");
    exit();
}

function emailExists($connection, $userEmail){
    $sql = "SELECT * FROM student_info WHERE email = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../student_portal/registration.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function emptyInputLogin($userEmail, $userPass){
    $result;
    if (empty($userEmail) || empty($userPass)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($connection, $userEmail, $userPass){
    $emailExists = emailExists($connection, $userEmail);

    if ($emailExists === false){
        header("location: ../student_portal/login.php?error=invalidlogin");
        exit();
    }

    $pwd = $emailExists['user_password'];

    if ($pwd != $userPass){
        header("location: ../student_portal/login.php?error=wrongpassword");
        exit();
    }
    else if ($pwd == $userPass){
        session_start();
        $_SESSION["useremail"] = $emailExists["email"];
        $_SESSION["userpass"] = $emailExists["user_password"];
        $_SESSION["userfname"] = $emailExists["firstName"];
        $_SESSION["userlname"] = $emailExists["lastName"];
        $_SESSION["useradd"] = $emailExists["userAddress"];
        $_SESSION["userphone"] = $emailExists["phone"];
        header("location: ../student_portal/profile.php");
        exit();
    }
}

function addStudent($connection, $fName, $lName, $email, $class){
    $tbl = $class;

    if ($tbl == 'c_fall') {
        $sql = "SELECT * FROM c_fall;";
        $results = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($results);

        if ($resultCheck >= 5){
            $sql = "INSERT INTO c_wait_list_fall (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
            $tbl = 'c_wait_list_fall';
        }
        else {
            $sql = "INSERT INTO c_fall (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
        }
    }
    else if ($tbl == 'c_winter') {
        $sql = "SELECT * FROM c_winter;";
        $results = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($results);

        if ($resultCheck >= 5){
            $sql = "INSERT INTO c_wait_list_winter (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
            $tbl = 'c_wait_list_winter';
        }
        else {
            $sql = "INSERT INTO c_winter (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
        }
    }
    else if ($tbl == 'c_spring') {
        $sql = "SELECT * FROM c_spring;";
        $results = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($results);

        if ($resultCheck >= 5){
            $sql = "INSERT INTO c_wait_list_spring (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
            $tbl = 'c_wait_list_spring';
        }
        else {
            $sql = "INSERT INTO c_spring (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
        }
    }
    else if ($tbl == 'c_summer') {
        $sql = "SELECT * FROM c_summer;";
        $results = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($results);

        if ($resultCheck >= 5){
            $sql = "INSERT INTO c_wait_list_summer (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
            $tbl = 'c_wait_list_summer';
        }
        else {
            $sql = "INSERT INTO c_summer (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
        }
    }
    else if ($tbl == 'my_sql_fall') {
        $sql = "SELECT * FROM my_sql_fall;";
        $results = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($results);

        if ($resultCheck >= 5){
            $sql = "INSERT INTO my_sql_wait_list_fall (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
            $tbl = 'my_sql_wait_list_fall';
        }
        else {
        $sql = "INSERT INTO my_sql_fall (first_name, last_name, email)
        VALUES ('$fName', '$lName', '$email');";
        }
        
    }
    else if ($tbl == 'my_sql_winter') {
        $sql = "SELECT * FROM my_sql_winter;";
        $results = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($results);

        if ($resultCheck >= 5){
            $sql = "INSERT INTO my_sql_wait_list_winter (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
            $tbl = 'my_sql_wait_list_winter';
        }
        else {
        $sql = "INSERT INTO my_sql_winter (first_name, last_name, email)
        VALUES ('$fName', '$lName', '$email');";
        }
        
    }
    else if ($tbl == 'my_sql_spring') {
        $sql = "SELECT * FROM my_sql_spring;";
        $results = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($results);

        if ($resultCheck >= 5){
            $sql = "INSERT INTO my_sql_wait_list_spring (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
            $tbl = 'my_sql_wait_list_spring';
        }
        else {
        $sql = "INSERT INTO my_sql_spring (first_name, last_name, email)
        VALUES ('$fName', '$lName', '$email');";
        }
        
    }
    else if ($tbl == 'my_sql_summer') {
        $sql = "SELECT * FROM my_sql_summer;";
        $results = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($results);

        if ($resultCheck >= 5){
            $sql = "INSERT INTO my_sql_wait_list_summer (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
            $tbl = 'my_sql_wait_list_summer';
        }
        else {
        $sql = "INSERT INTO my_sql_summer (first_name, last_name, email)
        VALUES ('$fName', '$lName', '$email');";
        }
        
    }
    else if ($tbl == 'python_fall') {
        $sql = "SELECT * FROM python_fall;";
        $results = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($results);

        if ($resultCheck >= 5){
            $sql = "INSERT INTO python_wait_list_fall(first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
            $tbl = 'python_wait_list_fall';
        }
        else {
            $sql = "INSERT INTO python_fall (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
        }
    }        
    else if ($tbl == 'python_winter') {
        $sql = "SELECT * FROM python_winter;";
        $results = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($results);

        if ($resultCheck >= 5){
            $sql = "INSERT INTO python_wait_list_winter (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
            $tbl = 'python_wait_list_winter';
        }
        else {
            $sql = "INSERT INTO python_winter (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
        }
    }        
    else if ($tbl == 'python_spring') {
        $sql = "SELECT * FROM python_spring;";
        $results = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($results);

        if ($resultCheck >= 5){
            $sql = "INSERT INTO python_wait_list_spring (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
            $tbl = 'python_wait_list_spring';
        }
        else {
            $sql = "INSERT INTO python_spring (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
        }
    } 
    else if ($tbl == 'python_summer') {
        $sql = "SELECT * FROM python_summer;";
        $results = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($results);

        if ($resultCheck >= 5){
            $sql = "INSERT INTO python_wait_list_summer (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
            $tbl = 'python_wait_list_summer';
        }
        else {
            $sql = "INSERT INTO python_summer (first_name, last_name, email)
            VALUES ('$fName', '$lName', '$email');";
        }
    }               

    mysqli_query($connection, $sql);

    $fullName = $fName."_".$lName;
    $sql = "INSERT INTO $fullName
     (classes) VALUES ('$tbl');";
    mysqli_query($connection, $sql);

    header("location: ../student_portal/profile.php?error=none");
    exit();
}

function cancelClass($connection, $fName, $lName, $email, $className){
    $tbl = $className;


    if ($tbl == 'c_fall') {
        $sql = "DELETE FROM c_fall WHERE email = '$email';";
    }
    else if ($tbl == 'c_winter') {
        $sql = "DELETE FROM c_winter WHERE email = '$email';";
    }
    else if ($tbl == 'c_spring') {
        $sql = "DELETE FROM c_spring WHERE email = '$email';";
    }
    else if ($tbl == 'c_summer') {
        $sql = "DELETE FROM c_summer WHERE email = '$email';";
    }
    else if ($tbl == 'c_wait_list_fall') {
        $sql = "DELETE FROM c_wait_list_fall WHERE email = '$email';";
    }
    else if ($tbl == 'c_wait_list_winter') {
        $sql = "DELETE FROM c_wait_list_winter WHERE email = '$email';";
    }
    else if ($tbl == 'c_wait_list_spring') {
        $sql = "DELETE FROM c_wait_list_spring WHERE email = '$email';";
    }
    else if ($tbl == 'c_wait_list_summer') {
        $sql = "DELETE FROM c_wait_list_summer WHERE email = '$email';";
    }
    else if ($tbl == 'my_sql_fall') {
        $sql = "DELETE FROM my_sql_fall WHERE email = '$email';";
    }
    else if ($tbl == 'my_sql_winter') {
        $sql = "DELETE FROM my_sql_winter WHERE email = '$email';";
    }
    else if ($tbl == 'my_sql_spring') {
        $sql = "DELETE FROM my_sql_spring WHERE email = '$email';";
    }
    else if ($tbl == 'my_sql_summer') {
        $sql = "DELETE FROM my_sql_summer WHERE email = '$email';";
    }
    else if ($tbl == 'my_sql_wait_list_fall') {
        $sql = "DELETE FROM my_sql_wait_list_fall WHERE email = '$email';";
    }
    else if ($tbl == 'my_sql_wait_list_winter') {
        $sql = "DELETE FROM my_sql_wait_list_winter WHERE email = '$email';";
    }
    else if ($tbl == 'my_sql_wait_list_spring') {
        $sql = "DELETE FROM my_sql_wait_list_spring WHERE email = '$email';";
    }
    else if ($tbl == 'my_sql_wait_list_summer') {
        $sql = "DELETE FROM my_sql_wait_list_summer WHERE email = '$email';";
    }
    else if ($tbl == 'python_fall') {
        $sql = "DELETE FROM python_fall WHERE email = '$email';";
    }   
    else if ($tbl == 'python_winter') {
        $sql = "DELETE FROM python_winter WHERE email = '$email';";
    }  
    else if ($tbl == 'python_spring') {
        $sql = "DELETE FROM python_spring WHERE email = '$email';";
    }  
    else if ($tbl == 'python_summer') {
        $sql = "DELETE FROM python_summer WHERE email = '$email';";
    }       
    else if ($tbl == 'python_wait_list_fall') {
        $sql = "DELETE FROM python_wait_list_fall WHERE email = '$email';";
    }
    else if ($tbl == 'python_wait_list_winter') {
        $sql = "DELETE FROM python_wait_list_winter WHERE email = '$email';";
    }
    else if ($tbl == 'python_wait_list_spring') {
        $sql = "DELETE FROM python_wait_list_spring WHERE email = '$email';";
    }
    else if ($tbl == 'python_wait_list_summer') {
        $sql = "DELETE FROM python_wait_list_summer WHERE email = '$email';";
    }

    mysqli_query($connection, $sql);

    $fullName = $fName."_".$lName;
    $sql = "DELETE FROM $fullName WHERE classes = '$tbl' 
    OR ('$tbl' + '_wait_list_fall') OR ('$tbl' + '_wait_list_winter')
    OR ('$tbl' + '_wait_list_spring') OR ('$tbl' + '_wait_list_summer');";
    mysqli_query($connection, $sql);

    header("location: ../student_portal/profile.php?error=none");
    exit();
}

function createUserTbl($connection, $fullName){
     
    $sql = "CREATE TABLE $fullName (classes varchar(40));";
    mysqli_query($connection, $sql);
}

function classList($connection){

    $fName = $_SESSION["userfname"];
    $lName = $_SESSION["userlname"];
    $fullName = $fName."_".$lName;

    $sql = "SELECT * FROM $fullName;";
    $results = mysqli_query($connection, $sql);
    $resultCheck = mysqli_num_rows($results);

    if ($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($results)){
            echo $row['classes']."<br>";
        }
    }
    
}
?>