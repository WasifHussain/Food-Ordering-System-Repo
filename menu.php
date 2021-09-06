<?php
session_start();
error_reporting(0);
include_once 'cart-action.php';
$conn=mysqli_connect('localhost','root','','db_projecti');
$sql = "SELECT * FROM items where restaurantID = '$_GET[restaurantID]'";
$res = mysqli_query($conn, $sql);
$data = [];
if (mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
		array_unshift($data, $row);
	}
}
	$sql1 = "SELECT * FROM restaurants where restaurantID = '$_GET[restaurantID]'";
	$result = mysqli_query($conn,$sql1);
	$rows = mysqli_fetch_assoc($result); 

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container-fluid menu-container p-0 m-0">
    	<div class="container-fluid menu-navbar p-0 m-0">
	      <?php
	        include "navbar.php";
	      ?>
    	</div>
    	<div class="container-fluid menu-header p-0 m-0">
    		<div class="row m-0" style="padding: 160px 0 0 55px">
				<div class="col-md-2" >
					<img height="185px" width="195px" style="border:10px solid #fff" src="css/images/<?php echo $rows['image']; ?>"/>
				</div>
				<div class="col-md-8 menu-header-description">
					<h1><b><?php echo $rows['res_name'];?></b></h1>
					<p><i class="fas fa-map-marker-alt" ></i>&nbsp;<?php echo $rows['address'];?></p>
					<p><i class="fas fa-envelope" ></i>&nbsp;<?php echo $rows['email'];?></p>
					<p><i class="fas fa-phone" ></i>&nbsp;<?php echo $rows['phone'];?></p>
				</div>
			</div>	
    	</div>
    	<div class="container-fluid menu-body p-0 m-0">
			<div class="container-fluid menu-title p-0 m-0">
				<h2>Menu</h2><hr>
			</div>
			<div class="container-fluid menu-table m-0">
				<div class="row">
					<div class="col-md-8">
						<table class="table">
							<thead class = "table-dark">
								<tr>
									<th>Popular Items</th>
									<th>Price(.Rs)</th>
									<th></th>
								</tr>
							</thead>
							<?php
									foreach ($data as $d) {
							?>
							<form method="POST" action='menu.php?restaurantID=<?php echo $_GET['restaurantID'];?>&action=add&id=<?php echo $d['itemID']; ?>'>
								<tr>
									<td>  
										<b><?php echo $d['itemname']; ?></b>
										<br>
										<i style="color: grey;"><?php echo $d['description'];?></i>
									</td>
									<td><?php echo $d['price'];?>
									</td>
									<td>
										<input type="number" name="quantity"  style="margin-left:30px; width: 40px" value="1" min="1" /><br>
										<input type="submit" value="Add to Cart" class="btn btn-outline-success" style="margin-top: 3px;">
									</td>
								</tr>
							</form>
							<?php } ?>
						</table>
					</div>
					<div class="col-md-4">
						<table class="table">
							<thead class="table-danger">
								<th>Your Shopping cart&nbsp;<i class="fas fa-shopping-cart"></i></th>
								<th></th>
								<th></th>
								<th></th>
							</thead>
								<?php
									$item_total = 0;
									foreach ($_SESSION["cart"] as $items) //fetch items define current into session ID
									{
								?>		
							<tr>
								<td><?php echo $items["itemname"]; ?></td>
								<td><?php echo 'Rs. '.$items["price"]; ?></td>
								<td><?php echo $items["quantity"]; ?></td>
								<td>
									<a href="menu.php?restaurantID=<?php echo $_GET['restaurantID']; ?>&action=remove&id=<?php echo $items["itemID"]; ?>">
									<i class="fas fa-trash-alt" style="color: red"></i></a>
								</td>
							</tr>
								<?php
									$item_total += ($items["price"]*$items["quantity"]);
									}
								?>
							<tr>
								<td colspan="4" align="center">
									<p><b>TOTAL</b></p>
									<p><b><?php echo 'Rs. '.number_format($item_total,2); ?></b></p>
									<a href="customer-dashboard.php?restaurantID=<?php echo $_GET['restaurantID'];?>&action=check"  class="btn btn-outline-primary">Checkout</a>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div><hr>
		</div>
		<div class="container-fluid about-footer">
	        <?php
	        include"footer.php";
	        ?>
    	</div>
    </div>
		<script src="javascript/all.js"></script>
</body>
</html>