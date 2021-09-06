<!DOCTYPE html>
<html>
<head>
	<title>Employee Login</title>
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
			$sql = "SELECT * FROM employees WHERE
			username = '$username' and password = '$password'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) == 1) {
			session_start();
			$_SESSION['employee'] = $username;
			header("location:employee-dashboard.php");
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

	<div class="container-fluid login-container p-0 m-0">
		<div class="container-fluid login-navbar p-0 m-0">
			<?php
			include "navbar.php";
			?>
		</div>

	    <div class="bg-img-elogin"></div>
		<div id ="login-body">
			<form name = "login" method="POST">
				<h2>Employee Login</h2>
					<div id="login-content">
						<label>Username</label><br>
						<input type="text" name="username" id="login-username" placeholder="Enter your Username" maxlength="30"><br>
						<span id="username_err"><?php if(isset($errusername)){echo $errusername;}?></span><br>
						<label for="password">Password</label><br>
						<input type="password" name="password" id="login-password" placeholder="Enter your Password"><br>
						<span id="password_err"><?php if (isset($errpassword)) {echo $errpassword;}?>
						</span>
						<span id="error"><?php if(isset($error)){ echo $error;}?></span><br>
						<input type="submit" value="Login" onclick="return userinput()" name="Login" id="login-submit"><br><br>
					</div>
			</form>
		</div>
	</div>
</body>
</html>