<?php

function emptyInputSignup($Username, $Email, $Password, $Confirm_Password){
    $result;
    if(empty($Username) || empty($Email) || empty($Password) || empty($Confirm_Password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function emptyInputLogin($Username, $Password){
    $result;
    if(empty($Username) || empty($Password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUsername($Username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $Username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidEmail($Email){
    $result;
    if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function passwordMatch($Password, $Confirm_Password){
    $result;
    if($Password !== $Confirm_Password){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function usernameExist($conn, $Username){
    $sql = "Select * FROM users WHERE username = :username ;";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':username', $Username);
	$statement->execute();

    if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function emailExist($conn, $Email){
    $sql = "Select * FROM users WHERE email = :email;";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':email', $Email);
	$statement->execute();

    if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createRequest($conn, $Username, $Email,  $Password, $Role){
    $sql ="Insert INTO user_request(username, email, password, requestRole) VALUE(:username, :email, :password, :requestRole)";
    $statement = $conn->prepare($sql);
    $hashedPassword  = password_hash($Password, PASSWORD_DEFAULT);
    $statement->bindParam(':username', $Username);
    $statement->bindParam(':email', $Email);
    $statement->bindParam(':password', $hashedPassword);
    $statement->bindParam(':requestRole', $Role);
	$statement->execute();

    header("location:   ../Login.php?error=none");
}

function UserRequest($conn, $Username){
    $sql = "Select * FROM user_request WHERE username = :username;";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':username', $Username);
	$statement->execute();

    if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
        return $row;
    }
    else{
        $result = "false";
        return $result;
    }
}

function LoginUser($conn, $Username, $Password){
    $usernameExist = usernameExist($conn, $Username);

    if($usernameExist === false){
        header("location: ../Login.php?error=nouser");
        exit();
    }

    $passwordHashed = $usernameExist["password"];

    $checkpassword = password_verify($Password, $passwordHashed);

    if($checkpassword === false){
        header("location: ../Login.php?error=wrongpass");
        exit();
    }
    else if ($checkpassword === true){
        session_start();
        $_SESSION["userID"] = $usernameExist["ID"];
        $_SESSION["username"] = $usernameExist["username"];
        $_SESSION["userrole"] = $usernameExist["role"];
        $_SESSION["start"] = time();
        $_SESSION["expire"] = $_SESSION["start"] + (30*60);

        userLog($conn, $usernameExist["username"], $usernameExist["email"]);

        header("location: ../index.php");
        exit();
    }
}
function userLog ($conn, $Username, $Email ){
    $sql ="Insert INTO users_log(username, email) VALUE(:username, :email)";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':username', $Username);
    $statement->bindParam(':email', $Email);
	$statement->execute();

}
/* 
function AdminRequest($conn, $Username){
    $user = usernameExist($conn, $Username);
    createRequest($conn, $user["username"], $user["email"], $user["password"], "Admin");

    header("location: ../Dashboard.php");
    exit();
}*/

function createSchedule($conn, $Actuator, $Time_On, $Time_Off, $Monday, $Tuesday, $Wednesday, $Thursday, $Friday, $Saturday, $Sunday){
    $sql ="Insert INTO schedule(Actuator, Turn_On, Turn_Off, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday) VALUE(:Actuator, :Turn_On, :Turn_Off, :Monday, :Tuesday, :Wednesday, :Thursday, :Friday, :Saturday, :Sunday)";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':Actuator', $Actuator);
    $statement->bindParam(':Turn_On', $Time_On);
    $statement->bindParam(':Turn_Off', $Time_Off);
    $statement->bindParam(':Monday', $Monday);
    $statement->bindParam(':Tuesday', $Tuesday);
    $statement->bindParam(':Wednesday', $Wednesday);
    $statement->bindParam(':Thursday', $Thursday);
    $statement->bindParam(':Friday', $Friday);
    $statement->bindParam(':Saturday', $Saturday);
    $statement->bindParam(':Sunday', $Sunday);
	$statement->execute();

    header("location:   ../Scheduler.php");
}

function checkSchedule($Time_On, $Time_Off){
	if(strtotime($Time_On) >= strtotime($Time_Off)){
		$result = "true";
		return $result; 
	}else{
		$result = "false";
		return $result; 
	}
}

function checkInsertSchedule($conn, $Actuator, $Time_On, $Time_Off, $Monday, $Tuesday, $Wednesday, $Thursday, $Friday, $Saturday, $Sunday){
    $sql = "Select * FROM schedule WHERE Actuator = :Actuator;";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':Actuator', $Actuator);
	$statement->execute();

    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		if(strtotime($row['Turn_On']) <= strtotime($Time_On) && strtotime($row['Turn_Off']) >= strtotime($Time_On)){
			if($row['Monday'] == $Monday && $Monday == 'true'){
                $result = "false";
                return $result; 
            }
            if($row['Tuesday'] == $Tuesday && $Tuesday == 'true'){
                $result = "false";
                return $result; 
            }
            if($row['Wednesday'] == $Wednesday && $Wednesday == 'true'){
                $result = "false";
                return $result; 
            }
            if($row['Thursday'] == $Thursday && $Thursday == 'true'){
                $result = "false";
                return $result; 
            }
            if($row['Friday'] == $Friday && $Friday == 'true'){
                $result = "false";
                return $result; 
            }
            if($row['Saturday'] == $Saturday && $Saturday == 'true'){
                $result = "false";
                return $result; 
            }
            if($row['Sunday'] == $Sunday && $Sunday == 'true'){
                $result = "false";
                return $result; 
            }
		}
	}
	if($statement){
		$result = "true";
		return $result;
	}
}	