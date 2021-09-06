<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php
		if (isset($_POST['Login'])) {
		if (isset($_POST['username']) && !empty($_POST['username'])) {
			$username = $_POST['username'];
		}
		else{
			$errusername = 'Please enter your username';
		}
		if (isset($_POST['password']) && !empty($_POST['password'])) {
			$password = md5($_POST['password']);
		}
		else{
			$errpassword = 'Please enter your password';
		}
		if (isset($username) && isset($password)) {
			$conn = mysqli_connect('localhost','root','','db_projecti');
			$sql = "SELECT * FROM customers WHERE
					username = '$username' AND password = '$password'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);
			if (mysqli_num_rows($result) == 1) {
					session_start();
				$_SESSION['customer'] = $username;
				$_SESSION['customerID'] = $row['customerID'] ;
				header("location:customer-dashboard.php");	
			}
			else{
				$error = "Wrong Username or Password.Please try again!";
				}
			}
		}
	?>	 
	<script type="text/javascript">
    	function userinput(){
	      username = document.login.username.value;
	      password = document.login.password.value;
		  if(username == ""){
	        document.getElementById("username_err").innerHTML ="Please enter your Username!"; 
	         return false;
	      }
	      if(password=="") {
	          document.getElementById("password_err").innerHTML ="Please enter your Password!";
	          return false;
	       }
	    }
  	</script>

	<div class="container-fluid login-container p-0">	
		<div class="container-fluid login-navbar p-0 m-0">
			<?php
			include "navbar.php";
			?>
		</div>
    	<div class="bg-image-login"></div>
		<div id ="login-body">
			<form method="post" name = "login" >
				<h2>Welcome back!</h2>
					<div id="login-content">
						<label>Username</label><br>
						<input type="text" name="username" id="login-username" placeholder="Enter your Username" maxlength="30"><br>
						<span id="username_err"><?php if(isset($errusername)){echo $errusername;}?></span><br>
						<label for="password">Password</label><br>
						<input type="password" name="password" id="login-password" placeholder="Enter your Password"><br>
						<span id="password_err"><?php if (isset($errpassword)) {echo $errpassword;}?></span>
						<span class="error"><?php if(isset($error)){ echo $error;}?></span><br>
						<input type="submit" value="Login" onclick="return userinput()" name="Login" id="login-submit"><br>
						<p>Don't have an account? <a href="register.php">Sign Up</a></p>
					</div>
			</form><hr>

			<div id="login-btn-grp">
			<button class="btn btn-secondary"><a href="admin-login.php" style="text-decoration: none; color: #fff">&nbsp;&nbsp;<b>Admin</b>&nbsp;&nbsp;</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button class="btn btn-secondary"><a href="employee-login.php" style="text-decoration: none; color: #fff"><b>Employee</b></a></button>
			</div>
		</div>
	</div>
</body>
</html>