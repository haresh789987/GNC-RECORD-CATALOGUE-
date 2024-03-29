<?php
$successMessage = $errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uname = $_POST['uname'];
    $pass = $_POST['password'];
    $name = $_POST['name'];
    $poss = $_POST['pos'];

    $conn = mysqli_connect('sql307.infinityfree.com', 'if0_34701432', 'FUMsWDdMmfdUH', 'if0_34701432_model');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM userr WHERE username='$uname'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $errorMessage = "The username is taken, try another";
    } else {
        $sql2 = "INSERT INTO userr(username, password, name, position) VALUES('$uname', '$pass', '$name', '$poss')";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
            $successMessage = "Your account has been created successfully";
        } else {
            $errorMessage = "An unknown error occurred";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SIGN UP</title>
    <link rel="stylesheet" type="text/css" href="style_1.css">
    <script>
        window.onload = function() {
            var successMessage = "<?php echo $successMessage; ?>";
            var errorMessage = "<?php echo $errorMessage; ?>";

            if (successMessage !== "") {
                alert(successMessage);
                
                window.location.href = "index.php"; // Redirect after success alert
            } else if (errorMessage !== "") {
                alert(errorMessage);
            }
        };
    </script>
</head>
<body style="background:url('https://blog.zoho.com/sites/zblogs/images/cliq/new-converted-2019-08.gif'); background-size:1600 820px;">

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <center><img src="images/LOGO.jpg" width="100px" height="100px"></center>
        <h2 style="color:black;">SIGN UP</h2>
   
        <input type="text" name="name" placeholder="Name" required><br>
    
        <input type="text" name="uname" placeholder="User Name" required><br>
      
        <input type="password" name="password" placeholder="Password" required><br>
      
        <input type="text" name="pos" placeholder="Position" required><br>
        <button type="submit">Sign Up</button>
        <button><a href="index.php" style="text-decoration: none; color:white;">Back</a></button>
    </form>
</body>
</html>
