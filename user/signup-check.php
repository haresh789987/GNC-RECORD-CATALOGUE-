<?php
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
        header("Location: signup.php?error=The username is taken, try another");
        exit();
    }

    $sql2 = "INSERT INTO userr(username, password, name, position) VALUES('$uname', '$pass', '$name', '$poss')";
    $result2 = mysqli_query($conn, $sql2);

    if ($result2) {
        // Redirect with success message
        header("Location: user.php?message=success");
        exit();
    } else {
        // Redirect with error message
        header("Location: signup.php?message=error");
        exit();
    }
}
header("Location: signup.php");
exit();
?>
