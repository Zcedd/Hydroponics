<?php
require_once 'conn.inc.php';

//$conn = new PDO("mysql:host=localhost;dbname=hydroponics", "root", "");

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch')
	{
		$order_column = array('Actuator', 'Turn_On', 'Turn_Off', 'Repeat', 'Option');

		$main_query = "
		SELECT `ID`, `Actuator`, `Turn_On`, `Turn_Off`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`
		FROM `schedule`
		";

		$search_query = ' ';

		if(isset($_POST["search"]["value"]))
		{
			$search_query .= 'WHERE (Actuator LIKE "%'.$_POST["search"]["value"].'%" OR Turn_On LIKE "%'.$_POST["search"]["value"].'%" OR Turn_Off LIKE "%'.$_POST["search"]["value"].'%")';
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
            $repeat = '';
            if($row['Monday']=='true'){
                $repeat .= 'Mon';
            }
            if($row['Tuesday']=='true'){
                $repeat .= ' Tue';
            }
            if($row['Wednesday']=='true'){
                $repeat .= ' Wed';
            }
            if($row['Thursday']=='true'){
                $repeat .= ' Thu';
            }
            if($row['Friday']=='true'){
                $repeat .= ' Fri';
            }
            if($row['Saturday']=='true'){
                $repeat .= ' Sat';
            }
            if($row['Sunday']=='true'){
                $repeat .= ' Sun';
            }

			$sub_array = array();

            $sub_array[] = $row['Actuator'];

			$sub_array[] = date('h:i A', strtotime($row['Turn_On']));

			$sub_array[] = date('h:i A', strtotime($row['Turn_Off']));

            $sub_array[] = $repeat;

            $sub_array[] = '<a href="javascript:void();" data-ID="'.$row['ID'].'"  class="delete deleteBtn" id="del_sched"><div class="deletebutton deleteBtn"><i class="fas fa-trash"></i></div></a>';

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