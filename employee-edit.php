<?php
session_start();
if (!isset($_SESSION['admin'])){
	header('location:admin-login.php');
	}
$employeeID = $_REQUEST['employeeID'];
$conn = mysqli_connect('localhost','root','','db_projecti');
	if (isset($_POST['submit'])) {
		$employeeID1=$_POST['employeeID'];
		$username = $_POST['username'];
		$address = $_POST['address'];
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$contact=$_POST['contact'];
		$sql = "UPDATE employees SET username = '$username' , address = '$address',email='$email',contact='$contact',password = '$password' WHERE employeeID = '$employeeID1'";
		mysqli_query($conn, $sql);
		
		if (mysqli_affected_rows($conn) == 1){
	 }
	 else{
	 	echo "Data update failed".mysqli_error($conn);
	 }
	}
	$sql1 = "SELECT * FROM employees WHERE employeeID = $employeeID";
	$res = mysqli_query($conn, $sql1);
	$data = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Employee</title>
	<link rel="stylesheet" type="text/css" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container-fluid employee-edit m-0 p-0">
    <div class="container-fluid employee-edit-nav m-0 p-0">
      <?php
        include 'navbar.php';
      ?>
    </div>
    <div class="container-fluid employee-edit-body m-0 p-0">
      <div class="container-fluid admin-db-header">
          <span><i class="fas fa-user-edit"></i>&nbsp;Update Employee</span>
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
                <a class="nav-link " href="#">Orders</a>
              </li><hr>
            </ul>
        </div>
        <div class="col-md-10 employee-add-form">
      		<form class="row py-3 bg-dark" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      		<input type="hidden" name="employeeID" value="<?php echo $data['employeeID'] ?>">
      		<div class="col-md-12">
                <input type="text" name="username" placeholder="Username" class="form-control" id="validationDefault01" value="<?php echo $data['username']; ?>" required><br>
              </div>
      		<div class="col-md-12">
                <input type="password" name="password" placeholder="Password" class="form-control" id="validationDefault01" value="<?php echo $data['password']; ?>" required><br>
              </div>
      		<div class="col-md-12">
                <input type="text" name="email" class="form-control" id="validationDefault01"
                value="<?php echo $data['email']; ?>" required placeholder="Email Address"><br>
              </div>
      		<div class="col-md-12">
                <input type="text" name="address" class="form-control" id="validationDefault01"
                value="<?php echo $data['address']; ?>" placeholder="Address" required><br>
              </div>
      		<div class="col-md-12">
                <input type="text" name="contact" class="form-control" maxlength="10" id="validationDefault01"
                value="<?php echo $data['contact']; ?>" placeholder="Contact Number" required>
              </div>
      	  	<div class="col-md-12 mt-3">
                <button class="btn btn-warning" type="submit" name="submit" onclick="alert('Employee Details Updated Successfully!')">Update Employee</button>
              </div>
            </form>
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
