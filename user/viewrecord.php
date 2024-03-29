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

      <a href="dasj.html" class="logo d-flex align-items-center">
        <img src="images/LOGO.jpg" class="img-fluid" alt="">
        <span>Guru Nanak College</span><p style="margin-top:25px; margin-left:10px;font-weight:bold;">(Autonomous)</P>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="dash.html">Home</a></li>
          <li><a class="nav-link scrollto" href="viewrecord.php">View Records</a></li>
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

          <?php 
			include('connect.php');
				$result = $db->prepare("SELECT * FROM records ORDER BY id DESC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>				<div style="text-align:center; text-align: center">
                                               
                            <p style="margin-top: 100px; margin-bottom: -50px;">Total Number of Records:<font color="green" style="font:bold 22px 'Aleo';">[<?php echo $rowcount;?>]</font></p>
                                </div>
                 <spam style="margin-top: 50px; font-size: 35px; color: blue; "> View Records</spam> 
       <?php
include('connect.php');

// Initialize variables for filters
$startYearFilter = isset($_GET['start_year']) ? $_GET['start_year'] : '';
$endYearFilter = isset($_GET['end_year']) ? $_GET['end_year'] : '';
$descriptionFilter = isset($_GET['description']) ? $_GET['description'] : '';

// Construct the SQL query with filters
$query = "SELECT * FROM records WHERE 1";

if (!empty($startYearFilter) && !empty($endYearFilter)) {
    // Add Year range filter
    $query .= " AND year BETWEEN :startYear AND :endYear";
}

if (!empty($descriptionFilter)) {
    // Add Description filter
    $query .= " AND des = :description";
}

$query .= " ORDER BY des ASC, `from` ASC, `to` ASC"; // Sort by Description, FROM, and TO

$result = $db->prepare($query);

if (!empty($startYearFilter) && !empty($endYearFilter)) {
    $result->bindValue(':startYear', $startYearFilter, PDO::PARAM_INT);
    $result->bindValue(':endYear', $endYearFilter, PDO::PARAM_INT);
}

if (!empty($descriptionFilter)) {
    $result->bindValue(':description', $descriptionFilter, PDO::PARAM_STR);
}

$result->execute();
?>

<div style="display: flex; align-items: center; margin-bottom: 10px;">
  <label for="description">Description:</label>
  <select style="height: 35px; color: #222; margin-right: 10px;" name="description" id="description">
    <option value="">All</option>
    <?php
    // Fetch all unique descriptions from the records table
    $query = $db->prepare("SELECT DISTINCT des FROM records");
    $query->execute();
    while ($row = $query->fetch()) {
      $description = $row['des'];
      $selected = $descriptionFilter === $description ? 'selected' : '';
      echo "<option value=\"$description\" $selected>$description</option>";
    }
    ?>
  </select>

  <label for="start_year">Start Year:</label>
  <input type="number" style="height: 35px; color: #222; margin-right: 10px;" name="start_year" id="start_year" placeholder="Start Year" autocomplete="off" />

  <label for="end_year">End Year:</label>
  <input type="number" style="height: 35px; color: #222; margin-right: 10px;" name="end_year" id="end_year" placeholder="End Year" autocomplete="off" />

  <button type="button" onclick="applyFilter()">Apply Filter</button>
</div>

<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left; overflow: scroll;">
    <!-- Table header code here -->
    <thead>
        <tr>
            <th width="20%"> RACK NO </th>
            <th width="10%"> TRAY </th>
            <th width="10%"> DESCRIPTION </th>
            <th width="10%"> TITLE </th>
            <th width="10%"> FROM </th>
            <th width="10%"> TO </th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $result->fetch()) {
            // Display the table rows based on the filtered results
            // ...
            ?>
            <tr>
                <td><?php echo $row['rack']; ?></td>
                <td><?php echo $row['tray']; ?></td>
                <td><?php echo $row['des']; ?></td>
                <td><?php echo $row['details']; ?></td>
<td><?php echo $row['from']; ?></td>
                <td><?php echo $row['to']; ?></td>   
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<script>
  function applyFilter() {
    const description = document.getElementById("description").value;
    const startYear = document.getElementById("start_year").value;
    const endYear = document.getElementById("end_year").value;
    const rows = document.getElementById("resultTable").getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {
      const row = rows[i];
      if (i === 0) {
        // Skip the table header row
        continue;
      }
      const descriptionCell = row.getElementsByTagName("td")[2];
      const fromCell = row.getElementsByTagName("td")[4];
      const toCell = row.getElementsByTagName("td")[5];
      const fromValue = parseInt(fromCell.innerText);
      const toValue = parseInt(toCell.innerText);

      const showRow =
        (description === "" || descriptionCell.innerText === description) &&
        (startYear === "" || (fromValue >= parseInt(startYear) && toValue <= parseInt(endYear)));

      row.style.display = showRow ? "" : "none";
    }
  }
</script>

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
            url: "deleterecords.php",
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