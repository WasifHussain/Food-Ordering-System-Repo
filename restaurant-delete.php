<?php
session_start();
if (!isset($_SESSION['admin'])){
	header('location:admin-login.php');
}
$restaurantID = $_GET['restaurantID'];
//connect to database
$conn = mysqli_connect('localhost','root','','db_projecti');
//query to delete record from tbl_category with id
$sql = "DELETE FROM restaurants WHERE restaurantID = $restaurantID";
//execute query
mysqli_query($conn, $sql);

//redirect to listing page
header('location:restaurant-view.php');
?>