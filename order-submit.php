<?php
 require('config.php');
 error_reporting(0);
 $total = $_POST['total'] * 100;
if (isset($_POST['stripeToken'])) {
 $token = $_POST['stripeToken'];

 $charge = \Stripe\Charge::create(array(
    "amount"=>$total,
    "currency"=>"npr",
    "description"=>"Payment Gateway",
    "source"=>$token,
 ));
}
?>
<?php
$conn=mysqli_connect('localhost','root','','db_projecti');
include_once 'cart-action.php';
error_reporting(0);
session_start();							  
	foreach ($_SESSION["cart"] as $items)
	{	
		$item_total += ($items["price"]*$items["quantity"]);				
				$sql="INSERT INTO orders (customerID,itemname,quantity,price,total,status,transactionID)
					 VALUES('".$_SESSION['customerID']."','".$items["itemname"]."','".$items["quantity"]."','".$items["price"]."','".$item_total."','Pending','".$token."')";	
				mysqli_query($conn,$sql);
	}
			header('location:customer-dashboard.php');
?>