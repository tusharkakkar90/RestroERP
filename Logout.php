<?php
	session_start();
	unset($_SESSION["email"]);
	unset($_SESSION["password"]);
	unset($_SESSION["status"]);
	header("Location:Login.php");
?>