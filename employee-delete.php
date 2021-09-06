<?php
session_start();
if (!isset($_SESSION['admin'])){
	header('location:admin-login.php');
}
$employeeID = $_GET['employeeID'];
//connect to database
$conn = mysqli_connect('localhost','root','','db_projecti');
//query to delete record from tbl_category with id
$sql = "DELETE FROM employees WHERE employeeID = $employeeID";
//execute query
mysqli_query($conn, $sql);

//redirect to listing page
header('location:admin-dashboard.php');
?>