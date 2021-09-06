<?php
session_start();
if (!isset($_SESSION['employee'])){
	header('location:employee-login.php');
	}
$itemID = $_REQUEST['itemID'];
$conn = mysqli_connect('localhost','root','','db_projecti');
	if (isset($_POST['submit'])) {
		$itemID1=$_POST['itemID'];
		$itemname = $_POST['itemname'];
		$price = $_POST['price'];
		$description = $_POST['description'];

		$sql = "UPDATE items SET itemname = '$itemname' , price = '$price', description='$description' 
            WHERE itemID = '$itemID1'";
		mysqli_query($conn, $sql);
		
		if (mysqli_affected_rows($conn) == 1){
	 }
	 else{
	 	echo "Data update failed".mysqli_error($conn);
	 }
	}
	$sql1 = "SELECT * FROM items WHERE itemID = $itemID";
	$res = mysqli_query($conn, $sql1);
	$data = mysqli_fetch_assoc($res);
?>


<!DOCTYPE html>
<html>
<head>
  <title>Update Item</title>
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
    <div class="container-fluid employee-db-body m-0 p-0">
      <div class="container-fluid admin-db-header">
          <span>Update Item&nbsp;<i class="fas fa-edit"></i></span>
          <button class="btn btn-primary logout-btn"><i class="fas fa-sign-out-alt"></i>&nbsp;<a href="logout.php">Log out</a></button>
      </div>
      <div class="container-fluid employee-add-form">
        <form class="row py-3 bg-dark" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
          <input type="hidden" name="itemID" value="<?php echo $data['itemID'] ?>">
        <div class="col-md-12">
          <input type="text" name="itemname" class="form-control" id="validationDefault01" required
          placeholder="Item name" value="<?php echo $data['itemname']; ?>"><br>
        </div>
        <div class="col-md-12">
          <input type="number" name="price" placeholder="Item Price" class="form-control" id="validationDefault03" required value="<?php echo $data['price']; ?>"><br>
        </div>
        <div class="col-md-12">
          <input type="text" name="description" placeholder="Item Description" class="form-control" id="validationDefault01"value="<?php echo $data['description']; ?>" required><br>
        </div>
        <div class="col-md-12 mt-3">
          <button class="btn btn-warning" type="submit" name="submit" onclick="alert('Item Updated Successfully!')">Update Item</button>
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