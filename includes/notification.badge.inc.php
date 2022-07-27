<?php
require_once 'conn.inc.php';

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch')
	{
		$main_query = "
		SELECT * FROM `user_request`;
		";
		$stmt = $conn->prepare($main_query);
		$stmt->execute();
		$row = $stmt->rowCount();
		echo json_encode($row);
		
	}
}