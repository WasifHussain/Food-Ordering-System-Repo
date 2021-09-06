
<!DOCTYPE html>
<html>
<head>
  <title>FoodWorld</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="container-fluid home-container p-0 m-0">
    <div class="container-fluid home-navbar p-0 m-0">
     <?php
     include "navbar.php";
     ?>
    </div>
    
    <div class="home-slogan">
       <h1>FOODWORLD</h1>
    </div>
    <h3 id="home-subslogan">Good Food Good Mood</h3>
     
    <div class="home-btn">
     <a href="login.php" class="home-sub-butn"><strong>Login</strong></a>
     <a href="register.php" class="home-sub-butn"><strong>Sign Up</strong></a>
    </div>
    
    <div class="bg-img-home"></div>
    <div class="container-fluid features">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="css/images/card1.jpg" />
            <div class="card-block">
              <h3 class="card-title" align="center"><b>No minimum Order</b></h3>
              <p class="card-text" align="center">
                Order in for yourself or for the group, with no restrictions on order value.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="css/images/card2.jpg" />
            <div class="card-block">
              <h3 class="card-title" align="center"><b>Fast Delivery</b></h3>
              <p class="card-text" align="center">
               We deliver food to your place fresh and on time as fast as possible.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="css/images/card3.jpg" />
            <div class="card-block">
              <h3 class="card-title" align="center"><b>Fresh From Kitchen</b></h3>
              <p class="card-text" align="center">
               Foods are delivered fresh directly from the kitchen of the ordered restaurant.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="jumbotron home-aboutus">
      <h2 align="center">About Us</h2>
      <p align="center">
        FoodWorld is the fastest, easiest and most convenient way to enjoy the best food of your favourite
        <br>
        restaurants at home, at the office or wherever you want to.<br><br>
        We know that your time is valuable and sometimes every minute in the day counts. That's why we<br>
        deliver!So you can spend more time doing the things you love.
      </p>
      <p align="center">
        <a class="btn btn-light btn-large" href="about.php">Learn more</a>
      </p>
    </div>

    <div class="container-fluid footer">
      <?php
        include "footer.php";
      ?>  
    </div>
  </div>
</body>
</html>