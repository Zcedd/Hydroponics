<?php 

require_once 'conn.inc.php';
//require_once 'dbconn.inc.php';

$schedule_id = $_POST['ID'];

$main_query = "
DELETE FROM `schedule` WHERE `ID` = '$schedule_id';
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

?>