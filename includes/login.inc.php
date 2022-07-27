<?php

if(isset($_POST["submit"])){
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];

    require_once 'conn.inc.php';
    include_once 'functions.inc.php';

    if (emptyInputLogin($Username, $Password) !== false){
        header("location: ../Login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $Username, $Password);
    
}