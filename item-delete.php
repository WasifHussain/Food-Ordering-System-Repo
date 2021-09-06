<?php
session_start();
if (!isset($_SESSION['employee'])){
	header('location:employee-login.php');
}
$itemID = $_GET['itemID'];
//connect to database
$conn = mysqli_connect('localhost','root','','db_projecti');
//query to delete record from tbl_category with id
$sql = "DELETE FROM items WHERE itemID = $itemID";
//execute query
mysqli_query($conn, $sql);

//redirect to listing page
header('location:item-view.php');
?>