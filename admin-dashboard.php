<?php
session_start();
if (!isset($_SESSION['admin'])){
	header('location:admin-login.php');
}
$conn=mysqli_connect('localhost','root','','db_projecti');
$sql = "SELECT * FROM employees";
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
  				<button class="btn btn-primary logout-btn"><i class="fas fa-sign-out-alt"></i>&nbsp;
  				<a href="logout.php">Log out</a></button>
			</div>
			<div class="row m-0 p-0">
				<div class="col-md-2 admin-db-sidenav">
						<ul class="nav flex-column">
							<li class="nav-item">
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
							<th>Username</th>
							<th>Address</th>
							<th>Email</th>
							<th>Contact</th>
							<th>RestaurantID</th>
							<th>Actions</th>
						</thead>
						<?php
							$i=1;
							foreach ($data as $d) {
						?> 
						<tbody>
							<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $d['username']; ?></td>
							<td><?php echo $d['address'];?></td>
							<td><?php echo $d['email'];?></td>
							<td><?php echo $d['contact'];?></td>
							<td><?php echo $d['restaurantID'];?></td>
							<td>
								<a href="employee-edit.php?employeeID=<?php echo $d['employeeID'] ?>">
									<i class="fas fa-edit" style="color: #ffc107; font-size: 23px"></i></a>
									&nbsp;
								<a href="employee-delete.php?employeeID=<?php echo $d['employeeID'] ?>" onclick = "return confirm('Are you sure to remove the employee?')">
									<i class="fas fa-trash-alt" style="color:#dc3545; font-size: 23px"></i></a>
							</td>
							</tr>
						</tbody>
						<?php } ?>
					</table>
					<button class="btn btn-success" style="width: 300px;"><a href="employee-add.php?employeeID=<?php echo $d['employeeID'] ?>"><b>Add Employee</b></a></button>
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