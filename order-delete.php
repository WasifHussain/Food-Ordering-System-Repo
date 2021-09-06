<?php
error_reporting(0);
session_start();
$conn=mysqli_connect('localhost','root','','db_projecti');

mysqli_query($conn,"UPDATE orders SET total = 0.2 * total, status = 'Cancelled' WHERE status = 'Pending' AND orderID = '".$_GET['order_del']."'"); 
header("location:customer-orders.php"); 

?>