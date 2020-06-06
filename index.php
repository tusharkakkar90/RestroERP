<?php
	session_start();
	include('mysql_conn.php');
	if(isset($_SESSION["email"])) {
		$table='menu';
		$sql="select * from $table";
		$result=mysqli_query($conn,$sql);
		$count_rows=mysqli_num_rows($result);
		$sql="Select max(oid) from orders";
  		$result_orders=mysqli_query($conn,$sql) or die("Error");
   		$result_data=mysqli_fetch_row($result_orders);
    	$id=$result_data[0] + 1;


	$page_content = 'Design_index.php';
	include('master.php');
	}
	else{
		header("Location:Login.php");
	}
?>