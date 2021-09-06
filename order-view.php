<?php
session_start();
include ('order-status.php');
if (!isset($_SESSION['admin'])){
	header('location:admin-login.php');
}
$conn=mysqli_connect('localhost','root','','db_projecti');
$sql = "SELECT * FROM orders ORDER BY orderID DESC";
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
	<title>Admin Dashboard</title>
	 <link rel="stylesheet" type="text/css" href="css/all.css">
	 <link rel="stylesheet" href="css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container-fluid admin-dashboard m-0 p-0">
		<div class="container-fluid admin-db-nav m-0 p-0">
			<?php
				include 'navbar.php';
			?>
		</div>
		<div class="container-fluid admin-db-body m-0 p-0">
  			<div class="container-fluid admin-db-header">
  				<span><i class="fas fa-users-cog"></i>&nbsp;Welcome Admin</span>
  				<button class="btn btn-primary logout-btn"><i class="fas fa-sign-out-alt"></i>&nbsp;<a href="logout.php">Log out</a></button>
			</div>
			<div class="row m-0 p-0">
				<div class="col-md-2 admin-db-sidenav">
						<ul class="nav flex-column">
							<li >
								<a class="nav-link" href="restaurant-view.php">Restaurants</a>
							</li><hr>
							<li class="nav-item">
								<a class="nav-link" href="admin-dashboard.php">Employees</a>
							</li><hr>
							<li class="nav-item">
								<a class="nav-link " href="order-view.php">Orders</a>
							</li><hr>
						</ul>
				</div>
			<div class="col-md-10 employee-table">
				<table class="table table-dark table-hover">
					<thead>
						<th>S.N</th>
						<th>Customer ID</th>
						<th>Itemname</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						<th>Status</th>
						<th>Order Date</th>
						<th>Change Status</th>
						<th>Action</th>
					</thead>
					<?php
						$i=1;
						foreach ($data as $d) {
					?> 
					<tbody>
						<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $d['customerID']; ?></td>
						<td><?php echo $d['itemname']; ?></td>
						<td><?php echo $d['quantity'];?></td>
						<td><?php echo $d['price'];?></td>
						<td><?php echo $d['total'];?></td>
						<td><?php echo $d['status'];?></td>
						<td><?php echo $d['order_date'];?></td>
						<td>
							<form action="" method="post">							
								<select name="status" onchange="form.submit()" class="form-select  form-select-sm">
									<option>Select</option>
									<option value="Delivered">Delivered</option>
									<option value="Pending">Pending</option>
									<option value="Cancelled">Cancelled</option>
								</select>
								<input type="hidden" name="id" value="<?php echo $d['orderID']; ?>" >
							</form>
						</td>
						<td>
							<a href="order-delete.php?order_del=<?php echo $d['orderID'];?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fas fa-trash" style="font-size:16px"></i></a>
						</td>
						</tr>
					</tbody>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
	<div class="col-12">
    	<hr><p align="center" id="Copyright">&copy; Copyright-Prizma Bagale & Wasif Hussain. All rights Reserved.</p>
  	</div>
  </div>
  	<script src="javascript/all.js"></script>
</body>
</html>