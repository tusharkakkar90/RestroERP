<?php
	session_start();
	include('mysql_conn.php');
	if(isset($_SESSION["email"])) {


		
		if(isset($_GET['table'])){
			$table=$_GET['table'];
		}
		else{
			$table ='orders';
		}
		
		$sql="select * from $table";
		$result=mysqli_query($conn,$sql);
		$count_rows=mysqli_num_rows($result);
		$sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'RestroERP' AND TABLE_NAME = '$table'";
		$result_count_head = mysqli_query($conn,$sql);
		$count_head =mysqli_num_rows($result_count_head);




		$page_content = 'Design_Orders_history.php';

		include('master.php');
		
		mysqli_close($conn);
	}
	else{
		header("Location:Login.php");
	}
?>