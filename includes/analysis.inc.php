<?php
require_once 'conn.inc.php';

//$conn = new PDO("mysql:host=localhost;dbname=hydroponics", "root", "");

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch')
	{
		$order_column = array('Time', 'WaterTemperature', 'RoomTemperature', 'Humidity', 'ElectricalConductivity', 'PHValue');

		$main_query = "
		SELECT  `Time`, `WaterTemperature`, `RoomTemperature`, `Humidity`, `ElectricalConductivity`, `PHValue` 
		FROM datas
		";

		$search_query = 'WHERE ';

		if(isset($_POST["start_date"], $_POST["end_date"]) && $_POST["start_date"] != '' && $_POST["end_date"] != '')
		{
			$search_query .= 'Time >= "'.$_POST["start_date"].'" AND Time <= "'.$_POST["end_date"].'" AND ';
		}

		if(isset($_POST["search"]["value"]))
		{
			$search_query .= '(WaterTemperature LIKE "%'.$_POST["search"]["value"].'%" OR RoomTemperature LIKE "%'.$_POST["search"]["value"].'%" OR Humidity LIKE "%'.$_POST["search"]["value"].'%" OR ElectricalConductivity LIKE "%'.$_POST["search"]["value"].'%" OR PHValue LIKE "%'.$_POST["search"]["value"].'%" OR Time LIKE "%'.$_POST["search"]["value"].'%")';
		}



		$group_by_query = " GROUP BY Time ";

		$order_by_query = "";

		if(isset($_POST["order"]))
		{
			$order_by_query = 'ORDER BY '.$order_column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$order_by_query = 'ORDER BY Time DESC ';
		}

		$limit_query = '';

		if($_POST["length"] != -1)
		{
			$limit_query = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$statement = $conn->prepare($main_query . $search_query . $group_by_query . $order_by_query);

		$statement->execute();

		$filtered_rows = $statement->rowCount();

		$statement = $conn->prepare($main_query . $group_by_query);

		$statement->execute();

		$total_rows = $statement->rowCount();

		$result = $conn->query($main_query . $search_query . $group_by_query . $order_by_query . $limit_query, PDO::FETCH_ASSOC);

		$data = array();

		foreach($result as $row)
		{
			$sub_array = array();

            $sub_array[] = $row['Time'];

			$sub_array[] = $row['WaterTemperature'];

			$sub_array[] = $row['RoomTemperature'];

			$sub_array[] = $row['Humidity'];

            $sub_array[] = $row['ElectricalConductivity'];

            $sub_array[] = $row['PHValue'];

			$data[] = $sub_array;
		}

		$output = array(
			"draw"			=>	intval($_POST["draw"]),
			"recordsTotal"	=>	$total_rows,
			"recordsFiltered" => $filtered_rows,
			"data"			=>	$data
		);

		echo json_encode($output);  
	}
}

?>