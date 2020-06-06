<?php
	session_start();
	if(isset($_SESSION["email"])) {
		header("Location:index.php");
	}
	include('mysql_conn.php');

	if(isset($_POST['Login'])){
		$email =$_POST['email'];
		$psw =$_POST['psw'];
		$table ='employee';
		$passsword_incorrect=0;
		$sql="select * from $table where email='$email' and password='$psw'";
		$result=mysqli_query($conn,$sql);
		$count_rows=mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		if($count_rows>0 && is_array($row) ){
			$_SESSION["email"] = $row['email'];
			$_SESSION["password"] = $row['password'];
			$_SESSION["status"] =$row['status'];
			$_SESSION["eid"] =$row['eid'];
			header("Location:index.php");
		}
		else{
			$passsword_incorrect=1;
		}

	}
	$page_content='Design_Login.php';
	include('master.php');
?>