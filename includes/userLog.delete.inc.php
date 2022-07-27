<?php 

require_once 'conn.inc.php';
//require_once 'dbconn.inc.php';

$user_id = $_POST['ID'];
$password = $_POST['password'];

$main_query = "
    SELECT * FROM `admin_password`;
	";
$stmt = $conn->prepare($main_query);
$stmt->execute();
$row = $stmt->fetch();

if (password_verify($password, $row['password'])) {
    $main_query = "
    DELETE FROM `users` WHERE `ID` = '$user_id';
    ";

    $result = $conn->exec($main_query);
    //$result = mysqli_query($conn, $main_query);

    if($result)
    {
        $data = array(
            'status'=>'success',
        );
        echo json_encode($data);  
    }
    else
    {
        $data = array(
            'status'=>'failed',
        );
        echo json_encode($data);  
    } 
}else{
    $data = array(
        'status'=>'wrongpassword',
    );
    echo json_encode($data);  
}

?>