<!DOCTYPE html>
<html>
<head>
	<title>About</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  	<link rel="stylesheet" href="css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container-fluid about-container p-0 m-0">
      <div class="container-fluid about-navbar p-0 m-0">
        <?php
          include "navbar.php";
        ?>
      </div>
      <div class="container-fluid about-header p-0 m-0">
        <img src="css/images/about.jpg" height="400px" width="100%">
        <div class="about-header-text">
          <p align="center">For us, it's not just about bringing you good food from your favourite restaurants. It's about making a connection, which is why we sit down with the chefs, dreaming up menus that will arrive fresh and full of flavours. Try us!</p><hr>
        </div>
      </div>
      <div class="container-fluid about-body p-0 m-0 bg-light">
        <h4>HOW IT WORKS</h4>
        <div class="row about-icons p-0 m-0">
          <div class="col-md-4">
            <i class="fad fa-shopping-cart"></i>
            <h5 align="center"><b>ORDER</b></h5>
          </div>
          <div class="col-md-4 ">
            <i class="fad fa-truck"></i>
            <h5 align="center"><b>RELAX</b></h5>
          </div>
          <div class="col-md-4">
            <i class="fad fa-burger-soda"></i>
            <h5 align="center"><b>ENJOY</b></h5>
          </div>
        </div>
      </div>
      <div class="container-fluid about-mission p-0 m-0 bg-dark">
        <h3>OUR MISSION</h3><br>
        <p>
          "Bringing good food into your everyday. That's our mission.<br><br>
           That means we don't just deliver--we bring it, always going the extra mile to make your experience memorable.<br><br>
           And it means this is delicious food you can enjoy everyday: from vibrant salads for healthy office lunches, to indulgent family-sized pizzas, to fresh sushi for a romantic night in. Whatever you crave, we can help."
        </p>
      </div> 
      <div class="container-fluid about-footer">
        <?php
        include"footer.php";
        ?>
      </div>
    </div>
</body>
</html>