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

  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <span>Guru Nanak College</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.html">Home</a></li>
                    <li><a class="nav-link scrollto" href="viewrecord.php">View Records</a></li>
          <li><a class="nav-link scrollto" href="addrecords.php">Add Records</a></li>
                              <li><a class="nav-link scrollto" href="usermanagement.php">Active Users</a></li>
                <li><a class="nav-link scrollto" href="index.php">LOG OUT</a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
</head>

<body>  
    <style>
      

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 8px;
  border: 1px solid #ccc;
}

th {
  background-color: #f2f2f2;
}

    </style>
    <audio autoplay loop>
  <source src="music/summer-walk-152722.mp3" type="audio/mpeg">
    <source src="music/summer-walk-152722.mp3" type="audio/ogg">
</audio>


    <div class="container">
      <div class="row">

                 <spam style="margin-top: 50px; font-size: 35px; color: blue; "> Current Users</spam> 


<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left; overflow: scroll;">
    <!-- Table header code here -->
    <thead>
        <tr>
            <th width="20%"> NAME </th>
            <th width="10%"> USERNAME </th>
            <th width="10%"> POSITION </th>
                        <th width="10%"> ACTION </th>
        </tr>
    </thead>
   <tbody>
<?php
include('connect.php');
// Assume you have a SQL query to fetch data from the database
$query = "SELECT id, name, username, position FROM userr"; // Added 'id' to the SELECT clause
        
// Prepare and execute the query
$stmt = $db->prepare($query);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // Changed '$result' to '$stmt'
    ?>
    <tr>
        <td><?php echo $row['username']; ?></td> <!-- Changed 'uname' to 'username' -->
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['position']; ?></td> 
        <td>
 
            <a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="Click To Delete">
                <button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button>
            </a>
        </td>
    </tr>
    <?php
}
?>
</tbody>

</table>



  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="assets/js/main.js"></script>

<script type="text/javascript">
    $(function() {
      $(".delbutton").click(function(){
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;

        if (confirm("Are you sure you want to delete this record? This action cannot be undone.")) {
          $.ajax({
            type: "GET",
            url: "deleteuser.php",
            data: info,
            success: function() {
              // After deletion is successful, reload the page
              window.location.reload();
            },
            error: function(xhr, status, error) {
              console.error(error); // Log the error for debugging
            }
          });
        }
      });
    });
  </script>
</body>

</html>