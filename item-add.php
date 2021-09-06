<?php
session_start();
if (!isset($_SESSION['employee'])){
  header('location:employee-login.php');
  }
  
$conn = mysqli_connect('localhost','root','','db_projecti');
  if (isset($_POST['submit'])) {
    
    $resID=$_POST['resID'];
    $itemname = $_POST['itemname'];
    $price = $_POST['price'];
    $description=$_POST['description'];
 
 
    $sql = "INSERT INTO items(itemname,price,description,restaurantID )
       VALUES ('$itemname','$price','$description', '$resID')";
    mysqli_query($conn, $sql);
      
    if (mysqli_affected_rows($conn) == 1) {
      header('location:item-add.php');
    }
   else{
    echo "Data insertion failed".mysqli_error($conn);
   }
  }
   $query = "SELECT * FROM employees WHERE username ='$_SESSION[employee]'";
    $res=mysqli_query($conn,$query);
    $data=mysqli_fetch_assoc($res);  
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Item</title>
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="container-fluid item-add m-0 p-0">
    <div class="container-fluid item-add-nav m-0 p-0">
      <?php
        include 'navbar.php';
      ?>
    </div>
    <div class="container-fluid item-add-body m-0 p-0">
      <div class="container-fluid admin-db-header">
          <span>Add Item&nbsp;<i class="fas fa-plus-square"></i></span>
          <button class="btn btn-primary logout-btn"><i class="fas fa-sign-out-alt"></i>&nbsp;<a href="logout.php">Log out</a></button>
      </div>
      <div class="container-fluid employee-add-form">
        <form class="row py-3 bg-dark" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
          <input type="hidden" name="resID" value="<?php echo $data['restaurantID'] ?>">
        <div class="col-md-12">
          <input type="text" name="itemname" class="form-control" id="validationDefault01" required
          placeholder="Item name"><br>
        </div>
       
        <div class="col-md-12">
          <input type="number" name="price" placeholder="Item Price" class="form-control" id="validationDefault03" required><br>
        </div>
        <div class="col-md-12">
          <textarea name="description" rows="5" placeholder="Item Description" class="form-control" id="validationDefault01" required></textarea><br>
        </div>
        <div class="col-md-12 mt-3">
          <button class="btn btn-success" type="submit" name="submit" onclick="alert('Item Added Successfully!')">Add Item</button>
        </div>
        </form>
      </div>
    </div>
    <div class="col-12">
    <hr><p align="center" id="Copyright">&copy; Copyright-Prizma Bagale & Wasif Hussain. All rights Reserved.</p>
    </div>
  </div>
    <script src="javascript/all.js"></script>
</body>
</html>