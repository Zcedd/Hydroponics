<?php
session_start();
require_once 'conn.inc.php';

if(isset($_POST['request'])){
	$user_id = $_SESSION["userID"];
	
	$copy_query = "
	SELECT * FROM `users` WHERE `ID` = ?;
	";
	$stmt = $conn->prepare($copy_query);
	$stmt->execute([$user_id]);
	$row = $stmt->fetch();

	$insert_query = "
	INSERT INTO `user_request`( `username`, `email`, `password`, `requestRole`) VALUES (?,?,?,?)
	";
	$result2 = $conn->prepare($insert_query)->execute(array($row['username'], $row['email'], $row['password'], 'Admin'));

	header("location: ../Dashboard.php");
    exit();
}	
if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch_sensor')
	{
		$main_query = "
		SELECT * FROM `datas` ORDER BY ID DESC LIMIT 1;
		";
		$stmt = $conn->prepare($main_query);
		$stmt->execute();
		$row = $stmt->fetch();
		echo json_encode($row);
	}
	if($_POST["action"] == 'fetch_light')
	{
		$main_query = "
		SELECT * FROM `actuator` WHERE `Actuator_name` = 'Grow Light' ORDER BY `Actuator_id` DESC LIMIT 1;
		";
		$stmt = $conn->prepare($main_query);
		$stmt->execute();
		$row = $stmt->fetch();
		echo json_encode($row);
	}
	if($_POST["action"] == 'fetch_waterPump')
	{
		$main_query = "
		SELECT * FROM `actuator` WHERE `Actuator_name` = 'Water Pump' ORDER BY `Actuator_id` DESC LIMIT 1;
		";
		$stmt = $conn->prepare($main_query);
		$stmt->execute();
		$row = $stmt->fetch();
		echo json_encode($row);
	}
	if($_POST["action"] == 'fetch_aerator')
	{
		$main_query = "
		SELECT * FROM `actuator` WHERE `Actuator_name` = 'Aerator/Air Pump' ORDER BY `Actuator_id` DESC LIMIT 1;
		";
		$stmt = $conn->prepare($main_query);
		$stmt->execute();
		$row = $stmt->fetch();
		echo json_encode($row);
	}
	if($_POST["action"] == 'fetch_exhaustFan')
	{
		$main_query = "
		SELECT * FROM `actuator` WHERE `Actuator_name` = 'Exhaust Fan' ORDER BY `Actuator_id` DESC LIMIT 1;
		";
		$stmt = $conn->prepare($main_query);
		$stmt->execute();
		$row = $stmt->fetch();
		echo json_encode($row);
	}
	if($_POST["action"] == 'fetch_misting')
	{
		$main_query = "
		SELECT * FROM `actuator` WHERE `Actuator_name` = 'Fogging Mist' ORDER BY `Actuator_id` DESC LIMIT 1;
		";
		$stmt = $conn->prepare($main_query);
		$stmt->execute();
		$row = $stmt->fetch();
		echo json_encode($row);
	}

}

?>