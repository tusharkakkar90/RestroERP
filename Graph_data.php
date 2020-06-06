<?php
	header('Content-Type: application/json');
	include('mysql_conn.php');
	
	if(!mysqli){
		die("Connection Failed:");
	}

	$query = sprintf("SELECT name,price from menu order by mid");
	$result = $mysqli->query($query);

	$data = array();
	foreach ($result as $row) {
		$data[] = $row;		
	}

	$result->close();
	$mysqli->close();

	print json_encode($data);

?>