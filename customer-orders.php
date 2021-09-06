<?php
session_start();

if (!isset($_SESSION['customer'])) {
	header('location:login.php');
}
$conn=mysqli_connect('localhost','root','','db_projecti');

$sql = "SELECT * FROM orders WHERE customerID = '".$_SESSION['customerID']."' ORDER BY orderID";
$res = mysqli_query($conn, $sql);
$data = [];
if (mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
		array_unshift($data, $row);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Dashboard</title>
		<link rel="stylesheet" type="text/css" href="css/all.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
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
						<a href="customer-dashboard.php">Checkout</a>
					</li>
					<li class="list-item list-inline-item">
						<span ><i class="fas fa-user"></i>&nbsp;Welcome, <?php echo $_SESSION['customer'] ?>
						</span>
					</li>
				</ul>
			</div>
			<div class="container-fluid display-orders" style="padding: 25px 70px 25px 70px;">
				<h2 align="center" style="font-family: Impact"><u>Your Orders</u></h2>
				<table class="table table-bordered" style="text-align: center ;">
					<thead class="table-info">
						<th>Item</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						<th>Status</th>
						<th>Order Date</th>
						<th>Action</th>
					</thead>
					<?php
							foreach ($data as $d) {
						?>
					<tbody> 
					<tr  class="table-striped">
						<td><?php echo $d['itemname']; ?></td>
						<td><?php echo $d['quantity']; ?></td>
						<td><?php echo $d['price']; ?></td>
						<td><?php echo $d['total']; ?></td>
						<td><?php echo $d['status']; ?></td>
						<td><?php echo $d['order_date']; ?></td>
						<td><a href="order-delete.php?order_del=<?php echo $d['orderID'];?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fas fa-trash" style="font-size:16px"></i>
							</a> 
						</td>
					</tr>
					</tbody>
					<?php } ?>
				</table>
			</div>
		</div><hr>
		<div class="container-fluid customer-db-footer">
	        <?php
	        include"footer.php";
	        ?>
    	</div>
  	</div>
	<script src="javascript/all.js"></script>
</body>
</html>