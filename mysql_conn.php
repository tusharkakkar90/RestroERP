<?php
$host='localhost';
$database='RestroERP';
$db_username='RestroERP';
$db_password='';
$conn = mysqli_connect($host,$db_username,$db_password,$database) or die('Unable to connect');
$mysqli =new mysqli($host,$db_username,$db_password,$database) or die('Unable to connect');
?>