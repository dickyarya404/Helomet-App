<?php

//action.php
$serverName = "10.5.0.123";
$uid = "sa";
$pwd = "Brekele893";
$databaseName = "hellomet";

$connectionInfo = array(
	"UID" => $uid,
	"PWD" => $pwd,
	"Database" => $databaseName
);

//$con = mysqli_connect("localhost","root","","hellomet"); //for mysql
//$connect = sqlsrv_connect($serverName, $connectionInfo); //for sql server

//$connect = new PDO("mysql:host=localhost;dbname=hellomet", "root", "");
$connect = new PDO("sqlsrv:Server=LAPTOP-9FK4RQP7;Database=hellomet", "admin", "admin123");

// try {
// 	$connect = new PDO("sqlsrv:Server={$serverName};Database={$databaseName}", $uid, $pwd);
// } catch (PDOException $exception) {
// 	echo "Connection error: " . $exception->getMessage();
// }


if (isset($_POST["action"])) {
	if ($_POST["action"] == 'fetch') {
		$order_column = array('dt_report_id', 'dt_report_countusing', 'dt_report_countnotusing', 'dt_report_datetime');

		$main_query = "
		SELECT dt_report_id, SUM(dt_report_countusing) AS dt_report_countusing, SUM(dt_report_countnotusing) AS dt_report_countnotusing, dt_report_datetime 
		FROM tb_dt_report 
		";

		$search_query = 'WHERE dt_report_datetime <= "' . date('Y-m-d') . '" AND ';

		if (isset($_POST["start_date"], $_POST["end_date"]) && $_POST["start_date"] != '' && $_POST["end_date"] != '') {
			$search_query .= 'dt_report_datetime >= "' . $_POST["start_date"] . '" AND dt_report_datetime <= "' . $_POST["end_date"] . '" AND ';
		}

		if (isset($_POST["search"]["value"])) {
			$search_query .= '(dt_report_id LIKE "%' . $_POST["search"]["value"] . '%" OR dt_report_countusing LIKE "%' . $_POST["search"]["value"] . '%" OR dt_report_countnotusing LIKE "%' . $_POST["search"]["value"] . '%" OR dt_report_datetime LIKE "%' . $_POST["search"]["value"] . '%")';
		}



		$group_by_query = " GROUP BY dt_report_datetime ";

		$order_by_query = "";

		if (isset($_POST["order"])) {
			$order_by_query = 'ORDER BY ' . $order_column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$order_by_query = 'ORDER BY dt_report_datetime DESC ';
		}

		$limit_query = '';

		if ($_POST["length"] != -1) {
			$limit_query = 'TOP ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$statement = $connect->prepare($main_query . $search_query . $group_by_query . $order_by_query);

		$statement->execute();

		$filtered_rows = $statement->rowCount();

		$statement = $connect->prepare($main_query . $group_by_query);

		$statement->execute();

		$total_rows = $statement->rowCount();

		$result = $connect->query($main_query . $search_query . $group_by_query . $order_by_query . $limit_query, PDO::FETCH_ASSOC);

		$data = array();

		foreach ($result as $row) {
			$sub_array = array();

			$sub_array[] = $row['dt_report_id'];

			$sub_array[] = $row['dt_report_datetime'];

			$sub_array[] = $row['dt_report_countusing'];

			$sub_array[] = $row['dt_report_countnotusing'];


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
