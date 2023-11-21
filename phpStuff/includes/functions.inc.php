<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat){
    $result = null;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}



function invalidEmail($email){
    $result = null; 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
     else{
        $result = false;
     }
        return $result;
    }

function invalidUid($username){
    $result = null;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function pwdMatch($pwd, $pwdrepeat){
    $result = null;
    if ($pwd !== $pwdrepeat){
        $result = true;
    }
    else{
        $result = false;
    }
        return $result;
    }
    
function uidExists($conn, $username, $email){
    $result = null;
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;"; 
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../sign-up.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    


    $resultData = mysqli_stmt_get_result($stmt);

    // closing from here to avoid unreachable code error
    mysqli_stmt_close($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        // return the data from the database is the user exists
        return $row;
    }
    else{
        $result = false; 
        return $result;
    }
}    


function createUser($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?) ;"; 
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../sign-up.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd) ;
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    // Sends the user to the index page after a successful sign-up
    header("location: ../index.php?error=none");
    exit();
}


function emptyInputLogin($username, $pwd){
    $result = null;
    if (empty($username) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true){
        //  Creates a new session
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
}
}

?>