<?php
if (isset($_POST["submit"])){
    
    $Username = $_POST["Username"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
    $Confirm_Password = $_POST["Confirm_Password"];
    $Role = "Admin";

    require_once 'conn.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($Username, $Email, $Password, $Confirm_Password) !== false){
        header("location: ../Login.php?error=emptyinput");
        exit();
    }
    if (invalidUsername($Username) !== false){
        header("location: ../Login.php?error=invalidUsername");
        exit();
    }
    if (invalidEmail($Email) !== false){
        header("location: ../Login.php?error=invalidEmail");
        exit();
    }
    if (passwordMatch($Password, $Confirm_Password) !== false){
        header("location: ../Login.php?error=passwordMatch");
        exit();
    }
    if (usernameExist($conn, $Username) !== false){
        header("location: ../Login.php?error=usernameExist");
        exit();
    }
    if (emailExist($conn, $Email) !== false){
        header("location: ../Login.php?error=emailExist");
        exit();
    }
    createRequest($conn, $Username, $Email, $Password, $Role);
}

else{
    header("location: ../Login.php");
}