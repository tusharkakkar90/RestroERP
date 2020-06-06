<?php
session_start();
include('mysql_conn.php');
if(isset($_SESSION["email"])) {
  
  if(isset($_POST['Submit']))
  {
    $table='customer';
    $name =$_POST['name'];
    $email=$_POST['email'];
    $phno =$_POST['phno'];
    $sql="Select max(cid) from $table";
    $result=mysqli_query($conn,$sql) or die("Error");
    $result_data=mysqli_fetch_row($result);
    $id=$result_data[0] + 1;
    $col_names='cid,name,phno,email';
    $values="$id,'$name','$phno','$email'";
    $sql="INSERT INTO $table ($col_names) VALUES ($values)";
    if(mysqli_query($conn,$sql)){
      
      header('Location:Tables.php?table=customer');
     
     }
     else{
       echo $sql;
       die("Unable to Insert Data");
      
     }

  }

  $page_content="Design_Add_Customer.php";
  include 'master.php';
}
else{
  header('Location:Login.php');

 }
?>