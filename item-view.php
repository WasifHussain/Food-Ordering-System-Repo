<?php
session_start();
if (!isset($_SESSION['employee'])){
	header('location:employee-login.php');
}
$conn=mysqli_connect('localhost','root','','db_projecti');
$sql = "SELECT * FROM items WHERE restaurantID = '$_GET[restaurantID]'";
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
	<title>Employee Dashboard</title>
		<link rel="stylesheet" type="text/css" href="css/all.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container-fluid employee-dashboard m-0 p-0">
		<div class="container-fluid employee-db-nav m-0 p-0">
			<?php
				include 'navbar.php';
			?>
		</div>
		<div class="container-fluid employee-db-body m-0 p-0">
  			<div class="container-fluid admin-db-header">
  				<span>Your Restaurant Menu</span>
  				<button class="btn btn-primary logout-btn"><i class="fas fa-sign-out-alt"></i>&nbsp;<a href="logout.php">Log out</a></button>
			</div>
		<div class="container-fluid menu-items">
			<table class="table table-dark table-hover" style="margin-top: 30px;">
					<thead>
						<th>S.N</th>
						<th>Item name</th>
						<th>Price</th>
						<th>Description</th>
						<th>Actions</th>
					</thead>
					<?php
						$i=1;
						foreach ($data as $d) {
					?> 
					<tbody>
						<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $d['itemname']; ?></td>
						<td><?php echo $d['price'];?></td>
						<td><?php echo $d['description'];?></td>
						<td>
							<a href="item-edit.php?itemID=<?php echo $d['itemID'] ?>">
								<i class="fas fa-edit" style="color: #ffc107; font-size: 23px"></i></a>&nbsp;
							<a href="item-delete.php?itemID=<?php echo $d['itemID'] ?>" onclick = "return confirm('Are you sure to remove the item?')">
								<i class="fas fa-trash-alt" style="color:#dc3545; font-size: 23px"></i></a></td>
						</tr>
					</tbody>
					<?php } ?>
				</table>
				<button class="btn btn-success" style="width: 300px; margin-left: 500px;">
					<a href="item-add.php" style="text-decoration: none;color: #fff;"><b>Add Item</b></a></button>
		</div>
		</div>
		<div class="col-12">
    		<hr><p align="center" id="Copyright">&copy; Copyright-Prizma Bagale & Wasif Hussain. All rights Reserved.</p>
  		</div>
  	</div>
	<script src="javascript/all.js"></script>
</body>
</html>