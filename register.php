<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
</head>
<body>
  <!------------------------------------- SERVER-SIDE VALIDAION ------------------------------------>
  <?php
    $errusername=$erraddress=$errcontact=$erremail=$errpassword=$errconpassword="";
    if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $address = $_POST['address'];
      $contact = $_POST['contact'];
      $email = $_POST['email'];
      $password = ($_POST['password']); 
      $con_password = $_POST['con_password'];

      $conn = new mysqli("localhost","root","","db_projecti");
          //for unique username
      $query ="SELECT username from customers WHERE username= '".$username."'LIMIT 1";
      $result=mysqli_query($conn,$query) or die(mysqli_error($conn)); 

      if (empty($username)) {
        $errusername= "Username is required!";
      }
      if (empty($address)) {
        $erraddress= "Address is required!";
      }
      if (empty($contact)) {
        $errcontact= "Mobile number is required!";
      }
      if(((!is_numeric($contact)) || (!strlen($contact)==10)) && (!empty($contact))){
         $errcontact = "Valid mobile number is required!";
      }
      if (empty($email)) {
        $erremail = "Email address is required!";
      }
      if ((!filter_var($email,FILTER_VALIDATE_EMAIL)) &&(!empty($email))) {
        $erremail= "Email should be in proper format!";
      }
      if (empty($password)) {
        $errpassword = "Password is required!";
      }
      if (empty($con_password)) {
        $errconpassword = "Confirm Password is required!";
      }
      if ($password!= $con_password) {
        $errconpassword = "Passwords do not match, try again!";
      }
      if (mysqli_num_rows($result)>0) {
        $errusername="Username already exists.Please choose another!";
      }
      if (($errusername||$errconpassword||$errpassword||$erremail||$errcontact||$erraddress)=="") {
        if($username && $email && $password && $address && $contact){
        $pass = md5($password);
        $sql = "INSERT INTO customers(username,password,email,address,contact)
        VALUES ('$username','$pass','$email','$address','$contact')";
        if (mysqli_query($conn,$sql) === TRUE) {
       header("location: login.php");
        }
        else{
        echo "Error";
        }
      }  
    }
    mysqli_close($conn);
    }
  ?>
  <!---------------------------------------- CLIENT-SIDE VALIDATION -------------------------------->
   <script type="text/javascript">
      function userinput(){
        Username = document.register.name.value;
        Password = document.register.password.value;
        contact = document.register.contact.value;
        email = document.register.email.value;
        Address = document.register.address.value;
        Con_password = document.register.con_password.value;

        var regexEmail = /^\w+([\.-_]?\w+)*@\w+(\.?\w)*(\.\w{2,3})$/
        var regexContact = /^\d{10}$/
        if (Username==""){ 
          document.getElementById("username_err").innerHTML ="Please enter your Username!"; 
          return false;
          }
        if (Address==""){
           document.getElementById("address_err").innerHTML ="Please enter your Address!";
          return false;
        }
        if (contact=="") {
          document.getElementById("contact_err").innerHTML ="Please enter your Mobile Number!";
          return false;
        }
        if (!contact.match(regexContact)) {
           document.getElementById("contact_err").innerHTML ="Please enter 10 digit Mobile Number!";
          return false;
        }
        if (email=="") {
          document.getElementById("email_err").innerHTML ="Please enter your Email Address!";
          return false;
        }
        if (!email.match(regexEmail)) {
           document.getElementById("email_err").innerHTML ="Please enter valid Email Address!";
          return false;
        }
        if (Password=="") {
          document.getElementById("password_err").innerHTML ="Please enter your Password!";
          return false;
        }
        if (Con_password=="") {
          document.getElementById("conpassword_err").innerHTML ="Please enter your Confirm Password!";
          return false;
        }
        if (Password!=Con_password) {
           document.getElementById("conpassword_err").innerHTML ="Your passwords do not match. Please try again!";
          return false;
        }
        }
    </script>

  <div class="container-fluid register-container p-0">
    <div class="container-fluid register-navbar">
      <?php
        include "navbar.php";
      ?>
    </div>

    <div class="bg-img-register"></div>
    <div id ="register-body">
      <form method = "POST" name = "register">
        <h2>New User!</h2>
        <div id="register-content">
          <label>Username</label><br>
          <input type="text" name="username" id="name" placeholder="Enter your Username" maxlength="30"><br>
          <span id="username_err"><?php echo $errusername;?></span><br>
          
          <label>Address</label><br>
          <input type="text" name="address" id="address" placeholder="Enter your Address"><br>
          <span id="address_err"><?php echo $erraddress;?></span><br>
                
          <label>Mobile number</label><br>
          <input type="text" name="contact" id="contact" placeholder="Enter your Mobile number"><br>
          <span id="contact_err"><?php echo $errcontact;?></span><br>

          <label>Email Address</label><br>
          <input type="text" name="email" id="email" placeholder="Enter your Email Address"><br>
          <span id="email_err"><?php echo $erremail;?></span><br>

          <label for="password">Password</label><br>
          <input type="password" name="password" id="password" placeholder="Enter your Password"><br>
          <span id="password_err"><?php echo $errpassword;?></span><br>
          
          <label for="con_password">Confirm Password</label><br>
          <input type="password" name="con_password" id="con_password" placeholder="Re-Enter your Password"><br>
          <span id="conpassword_err"><?php echo $errconpassword;?></span><br>

          <input type="submit" name="submit" onclick="return userinput()" value="Sign Up" id="submit">&nbsp;&nbsp;&nbsp;
          <input type="reset" id="reset">&nbsp;&nbsp;&nbsp;<br><br>
          
          <p>Already have an account? <a href="login.php">Log in</a></p>
        </div>
      </form>
    </div>
  </div>
</body>
</html>