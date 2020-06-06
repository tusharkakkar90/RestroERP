<?php
session_start();
include('mysql_conn.php');
if(isset($_SESSION["email"])) {
	
	if(isset($_POST['Submit']))
  {
    $table='employee';
    $name =$_POST['name'];
    $email=$_POST['email'];
    $phno =$_POST['phno']; 
    $Password =$_POST['Password'];
    $status =$_POST['status'];
    $salary =$_POST['salary'];
    $sql="Select max(eid) from $table";
    $result=mysqli_query($conn,$sql) or die("Error");
    $result_data=mysqli_fetch_row($result);
    $id=$result_data[0] + 1;
    $col_names='eid,name,phno,email,password,status,salary';
    $values="$id,'$name','$phno','$email','$Password',$status,$salary";
    $sql="INSERT INTO $table ($col_names) VALUES ($values)";
    if(mysqli_query($conn,$sql)){
      
      header('Location:Tables.php?table=employee');
     
     }
    else
    {
       echo $sql;
       die("Unable to Insert Data");
      
    }

  }
	$page_content="Design_Add_Employee.php";
	include ('master.php');
}

else
{
  header('Location:Login.php');

}
?>
