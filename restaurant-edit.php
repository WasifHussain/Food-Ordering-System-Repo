<?php
session_start();
if (!isset($_SESSION['admin'])){
	header('location:admin-login.php');
	}
$restaurantID = $_REQUEST['restaurantID'];
$conn = mysqli_connect('localhost','root','','db_projecti');
	if (isset($_POST['submit'])) {
		$restaurantID1=$_POST['restaurantID'];
		$res_name = $_POST['res_name'];
		$address = $_POST['address'];
		$email=$_POST['email'];
		$contact=$_POST['contact'];
    $image=$_FILES['image']['name'];
    if ($image=="") {
    $sql = "UPDATE restaurants SET res_name = '$res_name' , address = '$address',email='$email',phone='$contact'WHERE restaurantID = '$restaurantID1'";
    mysqli_query($conn, $sql);
      if (mysqli_affected_rows($conn) == 1){
      }
      else{
      echo "Data update failed".mysqli_error($conn);
      }
    }
		else{
      $sql = "UPDATE restaurants set res_name = '$res_name' , address = '$address',email='$email',phone='$contact',image ='$image'where restaurantID = '$restaurantID1'";
    mysqli_query($conn, $sql);
    move_uploaded_file($_FILES["image"]["tmp_name"],"css/images/".$image);
      if (mysqli_affected_rows($conn) == 1){
      }
      else{
      echo "Data update failed".mysqli_error($conn);
      }
    }
	}
	$sql1 = "SELECT * FROM restaurants WHERE restaurantID = $restaurantID";
	$res = mysqli_query($conn, $sql1);
	$data = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Restaurant</title>
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
          <span><i class="fas fa-user-edit"></i>&nbsp;Update Restaurant</span>
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
      		<form class="row py-3 bg-dark" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      		<input type="hidden" name="restaurantID" value="<?php echo $data['restaurantID'] ?>">
      		  <div class="col-md-12">
              <input type="text" name="res_name" placeholder="Restaurant Name" class="form-control"value="<?php echo $data['res_name']; ?>" required><br>
            </div>
      		  <div class="col-md-12">
              <input type="text" name="email" class="form-control" value="<?php echo $data['email'];?>" required placeholder="Email Address"><br>
            </div>
      		  <div class="col-md-12">
              <input type="text" name="address" class="form-control" value="<?php echo $data['address']; ?>" placeholder="Address" required><br>
            </div>
      		  <div class="col-md-12">
              <input type="text" name="contact" class="form-control" value="<?php echo $data['phone']; ?>" placeholder="Contact Number" required><br>
            </div>
          
            <div class="input-group mb-3">
              <label class="input-group-text" for="inputGroupFile01">Thumbnail</label>
              <input type="file" name="image" class="form-control" value="<?php echo $data['image'];?>" id="inputGroupFile01">
            </div>
          	<div class="col-md-12 mt-3">
              <button class="btn btn-warning" type="submit" name="submit" onclick="alert('Restaurant Details Updated Successfully!')">Update Restaurant</button>
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
