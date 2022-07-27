<?php
require_once 'conn.inc.php';

//$conn = new PDO("mysql:host=localhost;dbname=hydroponics", "root", "");

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch')
	{
		$order_column = array('username', 'email', 'requestRole');

		$main_query = "
		SELECT `ID`, `username`, `email`, `password`, `requestRole`
		FROM `user_request`
		";

		$search_query = ' ';

		if(isset($_POST["search"]["value"]))
		{
			$search_query .= 'WHERE (username LIKE "%'.$_POST["search"]["value"].'%" OR email LIKE "%'.$_POST["search"]["value"].'%" OR requestRole LIKE "%'.$_POST["search"]["value"].'%")';
		}



		$group_by_query = " GROUP BY ID ";

		$order_by_query = "";

		if(isset($_POST["order"]))
		{
			$order_by_query = 'ORDER BY '.$order_column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$order_by_query = 'ORDER BY ID DESC ';
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

            $sub_array[] = $row['username'];

			$sub_array[] = $row['email'];

			$sub_array[] = $row['requestRole'];

            $sub_array[] = '<a href="javascript:void();" data-id="'.$row['ID'].'" class="button__accept" id="accept">Accept</a><a href="javascript:void();" data-id="'.$row['ID'].'" class="button__deny" id="deny">Deny</a>';

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