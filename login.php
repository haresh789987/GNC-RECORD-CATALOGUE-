<?php
// Start session
session_start();

// Array to store validation errors
$errmsg_arr = array();

// Validation error flag
$errflag = false;

// Connect to the mysql server using mysqli
$link = mysqli_connect('sql307.infinityfree.com', 'if0_34701432', 'FUMsWDdMmfdUH', 'if0_34701432_model');
if (!$link) {
    die('Failed to connect to server: ' . mysqli_connect_error());
//    print("Success");
}

// Select database
$db_selected = mysqli_select_db($link, 'if0_34701432_model');
if (!$db_selected) {
    die("Unable to select database");
}

// Function to sanitize values received from the form. Prevents SQL injection
function clean($str)
{
    global $link;
    $str = trim($str);
    $str = stripslashes($str);
    return mysqli_real_escape_string($link, $str);
}

// Sanitize the POST values
$login = isset($_POST['username']) ? clean($_POST['username']) : '';
$password = isset($_POST['password']) ? clean($_POST['password']) : '';

// Input Validations
if ($login == '') {
    $errmsg_arr[] = 'Username missing';
    $errflag = true;
}
if ($password == '') {
    $errmsg_arr[] = 'Password missing';
    $errflag = true;
}

// If there are input validations, redirect back to the login form
if ($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: index.php");
    exit();
}

// Create query
$qry = "SELECT * FROM user WHERE username='$login' AND password='$password'";
$result = mysqli_query($link, $qry);

// Check whether the query was successful or not
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Login Successful
        session_regenerate_id();
        $member = mysqli_fetch_assoc($result);
        $_SESSION['SESS_MEMBER_ID'] = $member['id'];
        $_SESSION['SESS_FIRST_NAME'] = $member['name'];
        $_SESSION['SESS_LAST_NAME'] = $member['position'];
        session_write_close();
        header("location:dash.php");
        die();
    } else {
 
   header("location: 404.html");
    exit();
    }
} else {
    die("Query failed: " . mysqli_error($link));
}
?>
