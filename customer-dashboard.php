<?php
require "config.php";
$conn=mysqli_connect('localhost','root','','db_projecti');
include_once 'cart-action.php';
error_reporting(0);
session_start();
$sql1 = "SELECT * FROM customers WHERE username = '".$_SESSION['customer']."'";
$res = mysqli_query($conn, $sql1);
$data = [];
if (mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
		array_unshift($data, $row);
	}
}
if(!isset($_SESSION["customer"]))
	{
	header('location:login.php');
	}
else{								  
	foreach ($_SESSION["cart"] as $items)
	{	
		$item_total += ($items["price"]*$items["quantity"]);				
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer Dashboard</title>
		<link rel="stylesheet" type="text/css" href="css/all.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<style type="text/css">
			.stripe-button-el{
				width: 1168px;
			}
		</style>
</head>
<body>
	<div class="container-fluid customer-dashboard m-0 p-0">
		<div class="container-fluid customer-db-nav m-0 p-0">
			<?php
				include 'navbar.php';
			?>
		</div>
		<div class="container-fluid customer-db-body m-0 p-0">
  			<div class="container-fluid customer-db-header m-0 p-0">
  				<ul class="list-unstyled">
					<li class="list-item list-inline-item" style="float: right;">
						<a href="logout.php">Logout</a>
					</li>
					<li class="list-item list-inline-item" style="float: right;">
						<a href="customer-orders.php">Your Orders</a>
					</li>
					<li class="list-item list-inline-item">
						<span ><i class="fas fa-user"></i>&nbsp;Welcome, <?php echo $_SESSION['customer'] ?>
						</span>
					</li>
				</ul>
			</div>
			<div class="container-fluid checkout p-0">
				<form  action="order-submit.php" method="post">
				<div class="card">
					<h4 class="card-header">Cart Summary</h4>
					<div class="card-body">
						<table class="table bg-white">
							<tbody>
                                <tr>
                                    <td>Cart Subtotal</td>
                                    <td> <?php echo "Rs. ".$item_total; ?></td>
                                </tr>
                                <tr >
                                    <td>Shipping &amp; Handling</td>
                                    <td>Free Shipping</td>
                                </tr>
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td><strong> <?php echo "Rs. ".$item_total; ?></strong></td>
                                </tr>
                            </tbody>	
                        </table><br>
					<p class="card-text">
						<input class="form-check-input" type="radio" disabled> Payment On Delivery<i>(Currently Not Available)</i><br>
						<span>&emsp;&nbsp;Please send your cheque to Restaurant Name in its given address or you can make cash payment as well.</span>
					</p>
					<p class="card-text"><input class="form-check-input" type="radio" checked> Online Payment
						<span>
							<img src="css/images/paypal.jpg" height="30px" width="100px"><br><br>
							<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
							data-key="<?php echo $publishableKey?>" data-amount="<?php echo $item_total * 100;?>" data-name = "FOODWORLD" data-description="Payment Gateway" data-image="" data-currency="npr"
							data-email="">
							</script>	
							<input type="hidden" name="total" value="<?php echo $item_total?>">
						</span>
					</p>
					</form>
					</div>
				</div>
			</div><hr>
		</div>
		<div class="container-fluid customer-db-footer">
	        <?php
	        include"footer.php";
	        ?>
    	</div>
  	</div>
	<script src="javascript/all.js"></script>
</body>
</html>
<?php
}
?>
