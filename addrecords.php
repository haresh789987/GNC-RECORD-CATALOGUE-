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
<style>
#ac {
    width: 100%;
    max-width: 400px;
    margin: 0 auto; /* Center the box horizontally */
    text-align: center;
    padding: 20px;
    background-color: #f2f2f2;
    border-radius: 10px;
}

input[type="text"],
select,
input[type="number"] {
    width: 100%;
    height: 50px;
    margin-bottom: 20px;
    padding: 15px;
    box-sizing: border-box;
}

.btn-block {
    width: 100%;
    margin: 0;
}

/* Media query for smaller screens */
@media (max-width: 600px) {
    #ac {
        max-width: 90%; /* Adjust as needed */
    }
}

/* Media query for even smaller screens */
@media (max-width: 400px) {
    input[type="text"],
    select,
    input[type="number"] {
        height: 40px; /* Adjust as needed */
    }
}

    </style>


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
<form action="saverecords1.php" method="post" enctype="multipart/form-data">
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="dash.html" class="logo d-flex align-items-center">
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
            <h1 data-aos="fade-up">ADD RECORDS</h1>
        </div>
<div id="ac" style="text-align:left;">
    <input type="hidden" name="memi" value="<?php echo $id; ?>" />
    <label style="text-align: center";>Rack NO: </label><input type="text" style="width:100%; max-width:260px; height:30px; text-align: right;" name="rack" oninput="this.value = this.value.toUpperCase()" required /><br>
    <span style="text-align: center;">Tray No: </span>
    <select name="tray" style="width:100%; max-width:262px; height:50px;" required>
        <option value="1">TRAY1</option>
        <option value="2">TRAY2</option>
        <option value="3">TRAY3</option>
        <option value="4">TRAY4</option>
        <option value="5">TRAY5</option>
        <option value="6">TRAY6</option>
    </select>
    <br><br>
    <span style="text-align: center;">Description: </span>
    <input type="text" style="width:100%; max-width:225px; height:30px;" name="des" oninput="this.value = this.value.toUpperCase();" required /><br>
<span style="text-align: center;">Title: </span>
    <input type="text" style="width:100%; max-width:300px; height:30px;" name="details" oninput="this.value = this.value.toUpperCase();" required /><br>

    <span style="text-align: center;">From </span>
    <input type="number" name="from" style="width:100%; max-width:290px; height:30px;" min="1901" max="2051" step="1" required><br>
    <span style="text-align: center;">To </span>
    <input type="number" name="to" style="width:100%; max-width:310px; height:30px;" min="1901" max="2051" step="1" required><br>
    <div>
        <button class="btn btn-success btn-block btn-large" style="width: 100%; height: 40px;"><i class="icon icon-save icon-large"></i> Save Records</button>
    </div>
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