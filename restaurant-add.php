<?php
session_start();
if (!isset($_SESSION['admin'])){
  header('location:admin-login.php');
  }
$conn = mysqli_connect('localhost','root','','db_projecti');
  if (isset($_POST['submit'])) {
    $res_name = $_POST['res_name'];
    $address = $_POST['address'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $image="";
    $target_dir = "css/images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      die("Insert fail");
    }
    else{
      $image = $_FILES['image']['name'];
    }
    $sql = "INSERT INTO restaurants(res_name,email,address,phone,image)
       VALUES ('$res_name','$email','$address','$contact','$image')";
    mysqli_query($conn, $sql);
    
    if (mysqli_affected_rows($conn) == 1) {
   }
   else{
    echo "Data insertion failed".mysqli_error($conn);
   }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Restaurant</title>
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="container-fluid employee-add m-0 p-0">
    <div class="container-fluid employee-add-nav m-0 p-0">
      <?php
        include 'navbar.php';
      ?>
    </div>
    <div class="container-fluid employee-add-body m-0 p-0">
      <div class="container-fluid admin-db-header">
          <span><i class="fas fa-user-plus"></i>&nbsp;Add Restaurant</span>
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
          <form class="row py-3 bg-dark" method="post" enctype="multipart/form-data">
          <div class="col-md-12">
            <input type="text" name="res_name" class="form-control" required
            placeholder="Restaurant Name"><br>
          </div>
          <div class="col-md-12">
            <input type="text" name="address" placeholder="Address" class="form-control" required><br>
          </div>
          <div class="col-md-12">
            <input type="text" name="email" placeholder="Email Address" class="form-control"required><br>
          </div>
          <div class="col-md-12">
            <input type="text" name="contact" placeholder="Contact Number" maxlength="10" class="form-control" required><br>
          </div>
          <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Thumbnail</label>
            <input type="file" name="image" class="form-control" id="inputGroupFile01" required>
          </div>
          <div class="col-md-12 mt-3">
            <button class="btn btn-success" type="submit" name="submit" onclick="alert('New Restaurant Added Successfully!')">Add Restaurant</button>
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
