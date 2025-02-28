<?php
session_start();

if (!isset($_SESSION['SESS_MEMBER_ID'])) {
    header("Location: index.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GNC</title>
  <meta content="" name="description">
  <meta content="" name="keywords">



  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <audio autoplay loop>
  <source src="music/summer-walk-152722.mp3" type="audio/mpeg">
    <source src="music/summer-walk-152722.mp3" type="audio/ogg">
</audio>
      <form action="abc.php" method="POST">
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="dash.php" class="logo d-flex align-items-center">
          <img src="images/LOGO.jpg" class="img-fluid" alt="">
        <span>Guru Nanak College</span><p style="margin-top:25px; margin-left:10px;font-weight:bold;">(Autonomous)</P>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="dash.html">Home</a></li>
         <li><a class="nav-link scrollto" href="viewrecord.php">View Records</a></li>
          <li><a class="nav-link scrollto" href="addrecords.php">Add Records</a></li>
                                        <li><a class="nav-link scrollto" href="usermanagement.php">Active Users</a></li>
                <li><a class="nav-link scrollto" href="index.php">LOG OUT</a></li>

          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>

  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">RECORDS GAS </h1>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="viewrecord.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>VIEW RECORDS</span>    
                <i class="bi bi-arrow-right"></i>
              </a>
         
               <a href="addrecords.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>ADD RECORDS</span>    
                <i class="bi bi-arrow-right"></i>
              </a>
                   </div>
          </div>        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="images/LOGO.jpg" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section>


  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/js/main.js"></script>
      </FORM>
</body>

</html>
