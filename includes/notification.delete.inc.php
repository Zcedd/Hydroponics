<?php 

require_once 'conn.inc.php';
//require_once 'dbconn.inc.php';

$user_id = $_POST['ID'];

$main_query = "
DELETE FROM `user_request` WHERE `ID` = '$user_id';
";

$result = $conn->exec($main_query);
//$result = mysqli_query($conn, $main_query);

if($result==true)
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

?>