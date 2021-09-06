<!DOCTYPE html>
<html>
<head>
	<title>Connect</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/all.css">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container-fluid connect-container p-0 m-0">
    	<div class="container-fluid connect-navbar p-0 m-0">
     		<?php
     		include "navbar.php";
     		?>
      </div>
      <div class="container-fluid connect-body">
        <div class="row p-0 m-0">
          <div class="col-md-4 contact-info">
            <h2><b>Contact Info</b></h2><br>
            <h3>Phone</h3>  
            <i class="fas fa-phone-alt"></i>&nbsp;&nbsp;<span>4444177,4442321</span><hr>
            <h3>Email</h3>
            <i class="fas fa-envelope"></i>&nbsp;&nbsp;<span>info@foodworld.com</span><hr>
            <h3>Address</h3>
            <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;<span>Bijaychowk, Kathmandu, Nepal</span><hr>
          </div>
          <div class="col-md-8 map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.4778725540687!2d85.34412001422083!3d27.70252808279391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198310f52e7d%3A0x502c68cfd4f402ab!2sOrchid%20Int&#39;l%20College!5e0!3m2!1sen!2snp!4v1615215203761!5m2!1sen!2snp" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
      <div class="container-fluid about-footer">
        <?php
        include"footer.php";
        ?>
      </div>
  </div>
    <script src="javascript/all.js"></script> 	
</body>
</html>