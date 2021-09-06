<?php
session_start();
if (isset($_SESSION['admin'])){
session_destroy();
header('location:admin-login.php');
}
if(isset($_SESSION['employee'])){
	session_destroy();
	header('location:employee-login.php');
}
if(isset($_SESSION['customer'])){
	session_destroy();
	header('location:login.php');
}
?>
