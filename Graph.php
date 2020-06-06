<?php
	session_start();
	if(isset($_SESSION["email"])) {
	$page_content = 'Design_graph.php';
	include('master.php');
	}
	else{
		header("Location:Login.php");
	}
?>