<?php
session_start();
if (!isset($_SESSION['employee'])) {
	header('location:employee-login.php');
}
$conn=mysqli_connect('localhost','root','','db_projecti');

$sql = "SELECT * FROM employees WHERE username = '".$_SESSION['employee']."'";
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
  				<span style="font-size: 25px;"><i class="fas fa-users-cog"></i>&nbsp;Welcome, <?php echo $_SESSION['employee'] ?></span>
  				<button class="btn btn-primary logout-btn"><i class="fas fa-sign-out-alt"></i>&nbsp;<a href="logout.php">Log out</a></button>
			</div>
			<div class="container-fluid employee-info">
			<h2 align="center" style="font-family: Impact"><u>Your Details</u></h2>
			<table class="table table-dark" >
				<?php
						foreach ($data as $d) {
					?>
				<tbody> 
				<tr>
					<td><b><i class="fas fa-user"></i>&nbsp;Username</b></td>
					<td><?php echo $d['username']; ?></td>
				</tr>
				<tr>
					<td><b><i class="fas fa-map-marker-alt"></i>&nbsp;Address</b></td>
					<td><?php echo $d['address']; ?></td>
				</tr>
				<tr>
					<td><b><i class="fas fa-phone-square"></i>&nbsp;Contact</b></td>
					<td><?php echo $d['contact']; ?></td>
				</tr>
				<tr>
					<td><b><i class="fas fa-envelope"></i>&nbsp;Email</b></td>
					<td><?php echo $d['email']; ?></td>
				</tr>
			</tbody>
				<?php } ?>
			</table>
			<button class="btn btn-secondary" style="width: 200px; margin-left: 555px">
					<a href="item-view.php?restaurantID=<?php echo $d['restaurantID'] ?>" style="text-decoration: none; color: #FFF;"><b>View Menu</b></a></button>
			</div>
		</div>
		<div class="col-12">
    		<hr><p align="center" id="Copyright">&copy; Copyright-Prizma Bagale & Wasif Hussain. All rights Reserved.</p>
  		</div>
  	</div>
	<script src="javascript/all.js"></script>
</body>
</html>