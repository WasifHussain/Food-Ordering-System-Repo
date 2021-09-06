<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['admin'])){
  header('location:admin-login.php');
  }
  
$conn = mysqli_connect('localhost','root','','db_projecti');
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $address = $_POST['address'];
    $email=$_POST['email'];
    $password= md5($_POST['password']);
    $contact=$_POST['contact'];
    $restaurantid= $_POST['restaurantid'];
    $sql = "INSERT INTO employees (username,password,email,address,contact,restaurantID)
       VALUES ('$username','$password','$email','$address','$contact','$restaurantid')";
    mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) == 1){ 
        }
       else{
         echo "Data insertion failed".mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Employee</title>
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
          <span><i class="fas fa-user-plus"></i>&nbsp;Add Employee</span>
          <button class="btn btn-primary logout-btn" ><i class="fas fa-sign-out-alt"></i>&nbsp;<a href="logout.php">Log out</a></button>
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
          <form class="row py-3 bg-dark" method="post">
          <div class="col-md-12">
            <input type="text" name="username" class="form-control" id="validationDefault01" required
            placeholder="Username"><br>
          </div> 
          <div class="col-md-12">
            <input type="text" name="address" placeholder="Address" class="form-control" id="validationDefault03" required><br>
          </div>
          <div class="col-md-12">
            <input type="text" name="email" placeholder="Email Address" class="form-control" id="validationDefault01" required><br>
          </div>
          <div class="col-md-12">
            <input type="text" name="contact" placeholder="Contact Number" class="form-control" id="validationDefault01" required maxlength="10"><br>
          </div>
          <div class="col-md-12">
            <input type="password" name="password" placeholder="Password" class="form-control" id="validationDefault01" required><br>
          </div>
          <div class="col-md-12">
            <select name="restaurantid" class="form-control">
              <option>--Select a Restaurant--</option>
              <?php $ssql ="select * from restaurants";
                    $res=mysqli_query($conn, $ssql); 
                    while($row=mysqli_fetch_array($res))  
                      {
                      echo' <option value="'.$row['restaurantID'].'">'.$row['res_name'].'</option>';;
                      }                                 
              ?> 
            </select>
          </div>
          <div class="col-md-12 mt-3">
            <button class="btn btn-success" type="submit" name="submit" onclick="alert('New Employee Added Successfully!')">Add Employee</button>
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
